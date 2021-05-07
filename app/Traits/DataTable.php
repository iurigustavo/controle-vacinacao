<?php


    namespace App\Traits;

    use Yajra\DataTables\Html\Builder;
    use Yajra\DataTables\Html\Button;


    trait DataTable
    {
        public function html(): Builder
        {
            return $this->builder()
                        ->setTableId('dt-'.str_replace('DataTable', '', substr(__CLASS__, strrpos(__CLASS__, '\\') + 1), $offset))
                        ->columns($this->getColumns())
                        ->minifiedAjax()
                        ->postAjax()
                        ->responsive(TRUE)
                        ->dom("<'row py-3'<'col-sm-12 col-md-12'B>><'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 text-right'f>><'row py-3'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>")
                        ->orderBy(0)
                        ->buttons(
                            Button::make('colvis'),
                            Button::make('csv'),
                            Button::make('print'),
                            Button::make('reset'),
                            Button::make('reload')
                        )
                        ->language([
                            'url' => '/lang/pt_BR.json'
                        ])
                        ->stateSave(TRUE)
                        ->parameters([
                            'drawCallback' => 'function() { $(\'[data-toggle="popover"]\').popover() }',
                        ]);
        }

        protected function filename(): string
        {
            return str_replace('DataTable', '', substr(__CLASS__, strrpos(__CLASS__, '\\') + 1), $offset).'-'.date('YmdHis');
        }
    }