<?php


    namespace App\Actions\Agendas;


    use App\Models\Agenda;

    class DeleteAgenda
    {
        private Agenda $agenda;

        public function __construct(Agenda $agenda)
        {
            $this->agenda = $agenda;
        }

        /**
         * @throws \Exception
         */
        public function handle()
        {
            return $this->agenda->delete();
        }
    }