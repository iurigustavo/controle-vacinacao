<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Http\DataTables\Audits\AuditsDataTable;


    class AuditsController extends Controller
    {
        /**
         * @var
         */
        private $data;


        public function __construct()
        {
            $this->data['title'] = 'Log';
        }

        public function index(AuditsDataTable $dataTable)
        {

            $this->data['subTitle'] = 'Lista de Logs';
            $this->data['new'] = false;
            return $dataTable->render('template.datatables', ['data' => $this->data]);
        }


    }
