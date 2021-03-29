<?php


    namespace App\Http\Helpers;


    class DataTablesUtils
    {

        public function __construct()
        {

        }

        public static function Button($name, $route, $value = NULL, $class = "btn btn-primary mr-2", $fa_icon = NULL)
        {
            $btn = "<a href='".route($route, $value)."' class='".$class."'>";
            if ($fa_icon) {
                $btn .= "<i class=\"$fa_icon\"></i>";
            }
            $btn .= $name."</a > ";

            return $btn;
        }


        public static function btnShow($routeEdit, $id)
        {

            $r = "<div style='text-align: center'>";
            $r .= "<a style='display:inline-block'  href='".route($routeEdit, $id)."'
class='btn btn-sm btn-text-success btn-hover-light-success font-weight-bold mr-2'  title='Editar' ><i class=\"fa fa-edit\"></i></a>";
            return $r;
        }

        public static function btnAcaoComExcluir($routeEdit, $routeDestroy, $id)
        {

            $r = "<div style='text-align: center'>";
            $r .= "<a style='display:inline-block'  href='".route($routeEdit, $id)."'
class='btn btn-sm btn-text-success btn-hover-light-success font-weight-bold mr-2'  title='Editar' ><i class=\"fa fa-edit\"></i></a>";
            $r .=
//            '<a href="" class="delete-confirmation btn btn-sm btn-text-danger btn-hover-light-danger font-weight-bold mr-2"
//data-id="' . $id . '" data-routeDestroy="' . $routeDestroy . '"><i class="fa fa-trash"></i></a>';

                '<button class="remove-confirmation btn btn-sm btn-text-danger btn-hover-light-danger font-weight-bold mr-2"
        data-id="'.$id.'" data-action="'.route($routeDestroy, $id).'"><i class="fa fa-trash"></i></button>';
            $r .= "</div>";
            return $r;
        }

        public static function btnCrud($routeView, $routeEdit, $routeDestroy, $id)
        {

            $r = "<div style='text-align: center'>";
            $r .= "<a style='display:inline-block'  href='".route($routeView, $id)."'
class='btn btn-sm btn-text-success btn-hover-light-success font-weight-bold mr-2'  title='Editar' ><i class=\"fa fa-search\"></i></a>";
            $r .= "<a style='display:inline-block'  href='".route($routeEdit, $id)."'
class='btn btn-sm btn-text-success btn-hover-light-success font-weight-bold mr-2'  title='Editar' ><i class=\"fa fa-edit\"></i></a>";
            $r .=
                '<button class="remove-confirmation btn btn-sm btn-text-danger btn-hover-light-danger font-weight-bold mr-2"
        data-id="'.$id.'" data-action="'.route($routeDestroy, $id).'"><i class="fa fa-trash"></i></button>';
            $r .= "</div>";
            return $r;

        }

        /**
         * @param $routeEdit
         * @param $id
         *
         * @return string
         *
         *
         * Botão apenas de edição
         *
         */
        public static function btnAcaoEdicao($routeEdit, $id)
        {
            $r = "";
            $r .= "<a style='display:inline-block'  href='".route($routeEdit, $id)."' title='Editar' >".Metronic::getSVGDT("media/svg/icons/Communication/Write.svg",
                    "svg-icon-md svg-icon-info").
                "</a>";
            $r .= "";

            return $r;
        }


        /**
         * Get default builder parameters.
         *
         * @return array
         */
        public static function getBuilderParametersDatatables(
            $create = TRUE,
            $print = TRUE,
            $reload = TRUE,
            $export = FALSE,
            $order = [0, 'desc']
        ) {

            $botoes = [];
            if ($create) {
                $botoes[] = 'create';
            }
            if ($print) {
                $botoes[] = 'print';
            }
            if ($reload) {
                $botoes[] = 'reload';
            }
            if ($export) {
                $botoes[] = 'export';
            }

//			dd($order);

            return [
                'dom'           => 'lBfrtip',
                "processing"    => TRUE,
                "responsive"    => TRUE,
                'order'         => [$order],
                "stateSave"     => TRUE,
                'buttons'       => $botoes,
                "language"      => [
                    "sEmptyTable"     => "Nenhum registro encontrado",
                    "sInfo"           => "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty"      => "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered"   => "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix"    => "",
                    "sInfoThousands"  => ".",
                    "sLengthMenu"     => "_MENU_ resultados por página",
                    "sLoadingRecords" => "Carregando...",
                    "sProcessing"     => "Processando...",
                    "sZeroRecords"    => "Nenhum registro encontrado",
                    "sSearch"         => "Pesquisar",
                    "oPaginate"       => [
                        "sNext"     => "Próximo",
                        "sPrevious" => "Anterior",
                        "sFirst"    => "Primeiro",
                        "sLast"     => "Último"
                    ],
                    "oAria"           => [
                        "sSortAscending"  => ": Ordenar colunas de forma ascendente",
                        "sSortDescending" => ": Ordenar colunas de forma descendente"
                    ],
                ],
                //                'initComplete' => "function () {
                //                            this.api().columns().every(function () {
                //                                var column = this;
                //                                var input = document.createElement(\"input\");
                //                                $(input).appendTo($(column.footer()).empty())
                //                                .on('change', function () {
                //                                    column.search($(this).val(), false, false, true).draw();
                //                                });
                //                            });
                //                        }",
                ////
                'exportOptions' => [
                    'columns' => ':visible'
                ],

                'drawCallback'    => 'function() { App.initAjax() }',
                'stateSaveParams' => "function(settings, data) {
										if (data.order)
										data.order = ".json_encode($order).";
										}",

            ];
        }

        public
        static function LabelCor(
            $valor,
            $cor
        ) {

            return "<p class='$cor col - md - 12' style='padding: 1px; text - align: center'>$valor</p>";

        }


        public static function btnAcaoComExcluirComJustificativa(
            $routeEdit,
            $routeDestroy,
            $id
        ) {

            $r = "<div style='text-align: center'>";
            $r .= "<a style='display:inline-block'  href='".route($routeEdit, $id)."'
class='btn btn-default skin-purple uppercase'  title='Editar' ><i class=\"fa fa-edit\"></i></a>";
            $r .= '<button type="button" class="btn btn-default red" data-toggle="modal" data-target="#'.$id.'">
			<i class="fa fa-trash"></i>
		</button>';

            $r .= '<div class="modal fade" id="'.$id.'">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir ?</h4>
              </div>
               <form style=\'display:inline-block\' action="'.route($routeDestroy, $id).'" method="POST">
              <div class="modal-body">
              <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                
                <textarea cols="68" rows="10" name="justificativa" placeholder="Digite a justificativa da exclusão do registro"
 required></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Não</button>
                <button type="submit" class="btn btn-primary">Sim</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>';

            $r .= "</div>";

            return $r;
        }

        public static function btnAcaoSearch(
            $routeEdit,
            $id
        ) {
            $r = "<div style='text-align: center'>";
            $r .= "<a style='display:inline-block'  href='".route($routeEdit, $id)."'
class='btn btn-default skin-purple'  title='Visualizar' ><i class=\"fa fa-search\"></i></a>";
            $r .= "</div>";


            return $r;
        }

        public static function btnAcaoShow(
            $routeShow,
            $id
        ) {
            $r = "<div style='text-align: center'>";
            $r .= "<a style='display:inline-block'  href='".route($routeShow, $id)."'
class='btn btn-default skin-purple'  title='Visualizar' ><i class=\"fa fa-search\"></i></a>";
            $r .= "</div>";


            return $r;
        }

        public static function btnModal($id)
        {
            return '
<button type="button" class="btn btn-default skin-purple" data-toggle="modal" data-target="#modal'.
                $id.'">
            <i class="fa fa-search"></i>
        </button>';
        }


        public static function popover(
            $titulo,
            $msg,
            $icon
        ) {

            return '<button class="btn btn-default popovers"
							data-html="true"
							data-container="body" onclick=" "
							data-trigger="hover" data-placement="left"
							data-content=" '.$msg.' "
							data-original-title="<b>'.$titulo.'</b>"><i class="fa '.$icon.'" ></i></button>';
        }

        public function confirmation()
        {
            alert()->question('Title', 'Lorem Lorem Lorem');

        }

    }


