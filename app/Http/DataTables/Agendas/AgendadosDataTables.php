<?php


    namespace App\Http\DataTables\Agendas;


    use App\Http\Helpers\DataTablesUtils;
    use App\Http\Helpers\DateUtils;
    use App\Models\Agendado;
    use App\Traits\DataTable;
    use Yajra\DataTables\DataTableAbstract;
    use Yajra\DataTables\Html\Column;
    use Yajra\DataTables\Services\DataTable as YajraDataTable;

    class AgendadosDataTables extends YajraDataTable
    {
        use DataTable;

        public function dataTable($query): DataTableAbstract
        {
            return datatables()
                ->eloquent($query)
                ->addColumn('action', function ($q) {
                    return DataTablesUtils::btnShow('agendados.show', $q->id);
                })
                ->editColumn('agenda.data', function ($q) {
                    return DateUtils::DataParaString($q->data);
                })
                ->editColumn('compareceu', function ($q) {
                    return $q->compareceu ? 'Sim' : 'Não';
                })
                ->rawColumns([
                    'action',
                ])
                ->order(function ($query) {
                    $query->orderBy('id', 'desc');
                });

        }

        public function query(Agendado $model)
        {
            $query = $model->newQuery()->with(['pessoa', 'agenda', 'local']);
            if (request()->filled('data')) {
                $query->where('data', $this->request()->get('data'));
            }
            if (request()->filled('local')) {
                $query->where('local_id', $this->request()->get('local'));
            }
            return $query;
        }


        protected function getColumns(): array
        {
            return [

                Column::make('id')->title('ID'),
                Column::make('agenda.data')->title('Data'),
                Column::make('pessoa.nome')->title('Pessoa'),
                Column::make('local.descricao')->title('Local'),
                Column::make('compareceu')->title('Compareceu'),
                Column::computed('action')
                      ->exportable(false)
                      ->printable(false)
                      ->width(160)
                      ->title('Ação')
                      ->addClass('text-center'),
            ];
        }
    }
