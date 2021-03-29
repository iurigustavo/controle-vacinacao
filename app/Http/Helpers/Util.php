<?php
    /**
     * Created by PhpStorm.
     * User: julio
     * Date: 10/04/17
     * Time: 11:33
     */

    namespace App\Http\Helpers;

    //    use UxWeb\SweetAlert\SweetAlert;

    class Util
    {

        public function __construct()
        {

        }

        public static function btnModal($id)
        {
            return '
<button type="button" class="btn btn-default skin-purple" data-toggle="modal" data-target="#modal'.
                $id.'">
            <i class="fa fa-search"></i>
        </button>';
        }


        public static function popover($titulo, $msg, $icon)
        {
            return '<button class="btn btn-default popovers"
							data-html="true"
							data-container="body" onclick=" "
							data-trigger="hover" data-placement="left"
							data-content=" '.$msg.' "
							data-original-title="<b>'.$titulo.'</b>"><i class="fa '.$icon.'" ></i></button>';
        }
    }


