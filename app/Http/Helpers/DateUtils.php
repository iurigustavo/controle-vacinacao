<?php


    namespace App\Http\Helpers;


    class DateUtils
    {
        static function calcularIdade($then) {
            $then = date('Ymd', strtotime($then));
            $diff = date('Ymd') - $then;
            return substr($diff, 0, -4);
        }

        static function IntParaHora($hora)
        {
            if ($hora == null) {
                return null;
            } else if ($hora == "") {
                return null;
            } else {
                $hora = str_pad($hora, 4, '0', STR_PAD_LEFT);
                $hora = substr($hora, 0, 2) . ":" . substr($hora, 2, 2);

                return $hora;
            }
        }

        static function DataHoraParaString($data)
        {
            if ($data == null) {
                return null;
            } else if ($data == "") {
                return null;
            } else {
                return date("d/m/Y H:i:s", strtotime($data));
            }
        }

        static function DataParaString($data)
        {
            if ($data == null) {
                return null;
            } else if ($data == "") {
                return null;
            } else {
                return date("d/m/Y", strtotime($data));
            }
        }

        static function StringParaDataHora($data)
        {

            if ($data == null) {
                return null;
            } else if ($data == "") {
                return null;
            } else {
                if (strlen($data) == 12)
                    return date("Y-m-d H:i:s", \DateTime::createFromFormat("dmYHi", $data)
                                                        ->getTimestamp());
                else
                    return date("Y-m-d H:i:s", \DateTime::createFromFormat("d/m/Y H:i", $data)
                                                        ->getTimestamp());
            }
        }

        /**
         * @param $data
         *
         * @return bool|null|string
         */
        static function StringParaData($data)
        {

            if ($data == null) {
                return null;
            } else if ($data == "") {
                return null;
            } else {
                if (strlen($data) == 8)
                    return date("Y-m-d", \DateTime::createFromFormat("dmY", $data)->getTimestamp());
                else
                    return date("Y-m-d", \DateTime::createFromFormat("d/m/Y", $data)
                                                  ->getTimestamp());
            }
        }

        static function Now($modify = null)
        {
            $hoje = new  \DateTime();
            if ($modify != null) {
                $hoje->modify($modify);
            }

            return date("Y-m-d H:i:s", $hoje->getTimestamp());
        }

        static function CurrentDate()
        {
            $hoje = new  \DateTime();

            return date("Y-m-d", $hoje->getTimestamp());
        }

        static function IntParaDiaDaSemana($intDiaDaSemana)
        {
            $semana = [
                0 => 'Domingo',
                1 => 'Segunda-Feira',
                2 => 'Terca-Feira',
                3 => 'Quarta-Feira',
                4 => 'Quinta-Feira',
                5 => 'Sexta-Feira',
                6 => 'S�bado'
            ];

            return $semana[$intDiaDaSemana];

        }
    }