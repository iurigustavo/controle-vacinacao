<?php


    namespace App\Http\DataTables\Agendas;


    use App\Http\Helpers\DataTablesUtils;
    use App\Http\Helpers\DateUtils;
    use App\Models\Agenda;
    use App\Traits\DataTable;
    use Yajra\DataTables\DataTableAbstract;
    use Yajra\DataTables\Html\Column;
    use Yajra\DataTables\Services\DataTable as YajraDataTable;

    class AgendasDataTables extends YajraDataTable
    {
        use DataTable;

        public function dataTable($query): DataTableAbstract
        {
            return datatables()
                ->eloquent($query)
                ->addColumn('action', function ($q) {
                    return DataTablesUtils::btnShow('agendas.show', $q->id);
                })
                ->editColumn('data', function ($q) {
                    return DateUtils::DataParaString($q->data);
                })
                ->editColumn('habilitado', function ($q) {
                    return $q->habilitado ? 'Sim' : 'Não';
                })
                ->rawColumns([
                    'action',
                ])
                ->order(function ($query) {
                    $query->orderBy('id', 'desc');
                });

        }

        public function query(Agenda $model)
        {
            return $model->newQuery()->with('local');
        }


        protected function getColumns(): array
        {
            return [

                Column::make('id')->title('ID'),
                Column::make('data')->title('Data'),
                Column::make('periodo')->title('Periodo'),
                Column::make('quantidade')->title('Quantidade'),
                Column::make('faixa_etaria_min')->title('Faixa Etária Min'),
                Column::make('faixa_etaria_max')->title('Faixa Etária Max'),
                Column::make('quantidade')->title('Quantidade'),
                Column::make('local.descricao')->title('Local'),
                Column::make('habilitado')->title('Habilitado'),
                Column::computed('action')
                      ->exportable(FALSE)
                      ->printable(FALSE)
                      ->width(160)
                      ->title('Ação')
                      ->addClass('text-center'),
            ];
        }
    }
