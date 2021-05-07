<?php


    namespace App\Actions\Agendas;


    use App\Http\Requests\Agenda\AgendaRequest;
    use App\Models\Agenda;

    class CreateAgenda
    {
        private string $data;
        private string $periodo;
        private string $quantidade;
        private string $faixa_etaria_min;
        private string $faixa_etaria_max;
        private string $habilitado;
        private string $local_id;

        /**
         * CreateAgenda constructor.
         *
         * @param  string  $data
         * @param  string  $periodo
         * @param  string  $quantidade
         * @param  string  $faixa_etaria_min
         * @param  string  $faixa_etaria_max
         * @param  string  $habilitado
         * @param  string  $local_id
         */
        public function __construct(string $data, string $periodo, string $quantidade, string $faixa_etaria_min, string $faixa_etaria_max, string $habilitado, string $local_id)
        {
            $this->data             = $data;
            $this->periodo          = $periodo;
            $this->quantidade       = $quantidade;
            $this->faixa_etaria_min = $faixa_etaria_min;
            $this->faixa_etaria_max = $faixa_etaria_max;
            $this->habilitado       = $habilitado;
            $this->local_id         = $local_id;
        }

        public static function fromRequest(AgendaRequest $request): self
        {
            return new static(
                $request->data, $request->periodo, $request->quantidade, $request->faixa_etaria_min, $request->faixa_etaria_max, $request->habilitado, $request->local_id
            );
        }

        public function handle(): Agenda
        {
            $agenda = new Agenda([
                'data'             => $this->data,
                'periodo'          => $this->periodo,
                'quantidade'       => $this->quantidade,
                'faixa_etaria_min' => $this->faixa_etaria_min,
                'faixa_etaria_max' => $this->faixa_etaria_max,
                'habilitado'       => $this->habilitado,
                'local_id'         => $this->local_id,
            ]);

            $agenda->save();

            return $agenda;
        }


    }