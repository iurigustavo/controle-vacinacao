<?php


namespace App\Http\DataTables\Users;


use App\Http\Helpers\DataTablesUtils;
use App\Models\User;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($q) {
                return DataTablesUtils::btnShow('usuarios.show',  $q->id);
            })
            ->rawColumns([
                'action',
            ])
            ->order(function ($query) {
                $query->orderBy('id', 'desc');
            });

    }


    /**
     * Get query source of dataTable.
     *
     * @param User $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->responsive(true)
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
            Column::make('name')->title('Nome'),
            Column::make('email')->title('CPF'),
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
        return 'Usuarios-' . date('YmdHis');
    }
}
