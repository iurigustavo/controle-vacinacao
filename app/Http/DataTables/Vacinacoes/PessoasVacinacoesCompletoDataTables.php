<?php


    namespace App\Http\DataTables\Vacinacoes;


    use App\Http\Helpers\DataTablesUtils;
    use App\Http\Helpers\DateUtils;
    use app\Http\Library\Util;
    use App\Models\Pessoa;
    use App\Models\Vacinacao;
    use App\Models\viewPessoasVacinacao;
    use Yajra\DataTables\DataTableAbstract;
    use Yajra\DataTables\Html\Builder;
    use Yajra\DataTables\Html\Button;
    use Yajra\DataTables\Html\Column;
    use Yajra\DataTables\Services\DataTable;

    class PessoasVacinacoesCompletoDataTables extends DataTable
    {
        /**
         * Build DataTable class.
         *
         * @param  mixed  $query  Results from query() method.
         *
         * @return DataTableAbstract
         */
        public function dataTable($query)
        {
            return datatables()
                ->eloquent($query)
                ->editColumn('v1_data', function ($q) {
                    return DateUtils::DataParaString($q->v1_data);
                })
                ->editColumn('v2_data', function ($q) {
                    return DateUtils::DataParaString($q->v2_data);
                })
                ->filterColumn('v1_data', function ($query, $keyword) {
                    $query->whereRaw("to_char(v1_data,'DD/MM/YYYY') like ?", ["%$keyword%"]);
                })
                ->filterColumn('v2_data', function ($query, $keyword) {
                    $query->whereRaw("to_char(v2_data,'DD/MM/YYYY') like ?", ["%$keyword%"]);
                })
                ->addColumn('action', function ($q) {
                    return DataTablesUtils::btnShow('vacinacoes.show', $q->id);
                })
                ->rawColumns([
                    'action',
                ])
                ->order(function ($query) {
                    $query->orderBy('id', 'desc');
                })->setRowClass('{{ $v1_data == \'\' ? "alert-danger" : ($v2_data == \'\' ? "alert-warning" : "alert-success") }}');

        }


        /**
         * Get query source of dataTable.
         *
         * @param  Pessoa  $model
         *
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function query(viewPessoasVacinacao $model)
        {
            return $model->newQuery();
        }

        /**
         * Optional method if you want to use html builder.
         *
         * @return Builder
         */
        public function html()
        {
            return $this->builder()
                        ->setTableId('dt-table')
                        ->columns($this->getColumns())
                        ->minifiedAjax()
                        ->postAjax()
                        ->responsive(TRUE)
                        ->dom('lBfrtip')
//            ->dom('Bfrtip')
                        ->orderBy(0)
                        ->buttons(
//                Button::make('create'),
                    Button::make('colvis'),
                    Button::make('export'),
                    Button::make('print'),
                    Button::make('reset'),
                    Button::make('reload')
//                Button::make('copy')
                )
//            ->buttons(Button::make())
                        ->language([
                    'url'     => '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json',
                    'buttons' => [
                        "copy"   => "Copiar",
                        "colvis" => "Colunas Visíveis",
                        "export" => "Exportar",
                        "print"  => "Imprimir",
                        "reload" => "Recarregar",
                        "create" => "Cadastrar Novo"
                    ]
                ])
                        ->stateSave(TRUE)
                        ->parameters([
                            'drawCallback' => 'function() { $(\'[data-toggle="popover"]\').popover() }',

                        ]);
        }

        /**
         * Get columns.
         *
         * @return array
         */
        protected
        function getColumns()
        {
            return [

                Column::make('id')->title('ID'),
                Column::make('nome')->title('Nome'),
                Column::make('cpf')->title('CPF'),
                Column::make('idade')->title('Idade'),
                Column::make('v1_data')->title('Data da Primeira Vacinação'),
                Column::make('v1_cargo')->title('Cargo 1ª Vac'),
                Column::make('v1_local')->title('Lotação 1ª Vac'),
                Column::make('v2_data')->title('Data da Segunda Vacinação'),
                Column::computed('action')
                      ->exportable(FALSE)
                      ->printable(FALSE)
                      ->width(120)
                      ->title('Ação')
                      ->addClass('text-center'),
            ];
        }

        /**
         * Get filename for export.
         *
         * @return string
         */
        protected
        function filename()
        {
            return 'Vacinacoes-'.date('YmdHis');
        }
    }
