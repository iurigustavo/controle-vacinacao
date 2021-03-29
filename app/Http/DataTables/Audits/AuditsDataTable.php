<?php

    namespace App\Http\DataTables\Audits;

    use App\Http\Helpers\DateUtils;
    use App\Http\Helpers\Util;
    use App\Models\Audit;
    use Yajra\DataTables\Html\Button;
    use Yajra\DataTables\Html\Column;
    use Yajra\DataTables\Services\DataTable;

    class AuditsDataTable extends DataTable
    {

        /**
         * Build DataTable class.
         *
         * @param  mixed  $query  Results from query() method.
         * @return \Yajra\DataTables\DataTableAbstract
         */
        public function dataTable($query)
        {
            return datatables()
                ->eloquent($query)
                ->addColumn('action', function ($q) {
                    if ($q->old_value or $q->new_values) {
                        return Util::btnModal($q->id);
                    }
                })
                ->editColumn('user', function ($q) {
                    if ($q->user) {
                        return $q->user->username.' - '.$q->user->name;
                    }
                    return '';
                })
                ->addColumn('#', function ($q) {
                    if ($q->old_value or $q->new_values) {
                        return view('template.audits', ['model' => $q]);
                    }
                })
                ->editColumn('created_at', function ($q) {
                    return DateUtils::DataHoraParaString($q->created_at);
                })
                ->editColumn('updated_at', function ($q) {
                    return DateUtils::DataHoraParaString($q->updated_at);
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("to_char(created_at,'DD/MM/YYYY HH:MI:SS') like ?", ["%$keyword%"]);
                })
                ->filterColumn('updated_at', function ($query, $keyword) {
                    $query->whereRaw("to_char(updated_at,'DD/MM/YYYY HH:MI:SS') like ?", ["%$keyword%"]);
                })
                ->filter(function ($query) {
                    if (request('auditable_type')) {
                        $query->where('auditable_type', request('auditable_type'));
                    }
                    if (request('event')) {
                        $query->where('event', request('event'));
                    }
                    if (request('user_id')) {
                        $query->where('user_id', request('user_id'));
                    }

                }, true)
                ->rawColumns([
                    'action',

                ]);

        }


        public function query(Audit $model)
        {

            return $model->newQuery()->with('user');
        }

        /**
         * Optional method if you want to use html builder.
         *
         * @return \Yajra\DataTables\Html\Builder
         */
        public function html()
        {
            return $this->builder()
                ->setTableId('audits-table')
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->postAjax()
                ->dom('lBfrtip')
//            ->dom('Bfrtip')
                ->orderBy(6)
                ->buttons(
//                Button::make('create'),
                    Button::make('colvis'),
                    Button::make('export'),
                    Button::make('print'),
//                Button::make('reset'),
//                Button::make('reload')
                //                Button::make('copy')
                )
//            ->buttons(Button::make())
                ->language([
                    'url' => '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json',
                    'buttons' => [
                        "copy" => "Copiar",
                        "colvis" => "Colunas Visíveis",
                        "export" => "Exportar",
                        "print" => "Imprimir",
                        "reload" => "Recarregar",
                        "create" => "Cadastrar Novo"
                    ]
                ])
                ->stateSave(true)
                ->parameters([
                    'drawCallback' => 'function() { $(\'[data-toggle="popover"]\').popover() }',
                    //

                    //
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

                Column::make('id')->title('Id Registro'),
                Column::make('event')->title('Tipo'),
                Column::make('auditable_type')->title('Model'),
                Column::make('user')->name('user.username')->title('Modificado Por'),
                Column::make('user')->name('user.name')->title('Modificado Por')->hidden(true),
                Column::make('created_at')->title('Criado'),
                Column::make('updated_at')->title('Atualização'),
                Column::make('#')->addClass('d-none d-sm-table-cell')->searchable(false)->orderable(false),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(120)
                    ->title('Ação')
                    ->addClass('text - center'),
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
            return 'Audits_'.date('YmdHis');
        }
    }
