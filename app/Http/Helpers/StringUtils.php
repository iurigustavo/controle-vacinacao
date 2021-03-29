<?php
    
    
    namespace App\Http\Helpers;
    
    
    class StringUtils
    {
        
        public static function verify($parametro)
        {
            if (isset($parametro)) {
                if (!empty($parametro)) {
                    return $parametro;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }
        
        public static function contains($str, $content, $ignorecase = true)
        {
            
            if ($ignorecase) {
                
                $str = strtolower($str);
                
                $content = strtolower($content);
                
            }
            
            return (boolean)strpos($content, $str) ? true : false;
            
        }
        
        
        public static function endWith($needle, $haystack)
        {
            
            return (boolean)(substr($haystack, strlen($needle) * (-1)) == $needle);
            
        }
        
        
        public static function startWith($needle, $haystack)
        {
            
            return (boolean)(substr($haystack, 0, strlen($needle)) == $needle);
            
        }
        
        
        public static function toLinks($string = null)
        {
            
            if ($string == null || !preg_match('/(http|www\.|ftp\.|@)/i', $string)) {
                return $string;
            }
            
            $lines = explode('\n', $string);
            $return = '';
            
            
            while (list($k, $l) = each($lines)) {
                
                $l = preg_replace("/([ \t]|^)www\./i", "\\1http://www.", $l);
                
                $l = preg_replace("/([ \t]|^)ftp\./i", "\\1ftp://ftp.", $l);
                
                $l = preg_replace("/(http:\/\/[^ )\r\n!]+)/i", "<a href=\"\\1\">\\1</a>", $l);
                
                $l = preg_replace("/(https:\/\/[^ )\r\n!]+)/i", "<a href=\"\\1\">\\1</a>", $l);
                
                $l = preg_replace("/(ftp:\/\/[^ )\r\n!]+)/i", "<a href=\"\\1\">\\1</a>", $l);
                
                $l = preg_replace("/([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))/i", "<a href=\"mailto:\\1\">\\1</a>", $l);
                
                $return .= $l . "\n";
                
            }
            
            
            return $return;
            
        }
        
        
        public static function getBetween($start, $end, $haystack)
        {
            
            $r = explode($start, $haystack);
            
            if (isset($r[1])) {
                
                $r = explode($end, $r[1]);
                
                return $r[0];
                
            }
            
            return '';
            
        }
        
        
        public static function removeLinks($string)
        {
            
            return preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $string);
            
        }
        
        
        public static function left($s1, $s2)
        {
            
            return substr($s1, 0, strpos($s1, $s2));
            
        }
        
        
        public static function camelCase($str, $exclude = [])
        {
            // replace accents by equivalent non-accents
            $str = self::replaceAccents($str);
            // non-alpha and non-numeric characters become spaces
            $str = preg_replace('/[^a-z0-9' . implode("", $exclude) . ']+/i', ' ', $str);
            // uppercase the first character of each word
            $str = ucwords(trim($str));
            
            return lcfirst(str_replace(" ", "", $str));
        }
        
        
        public static function replaceAccents($str)
        {
            $search = explode(",", "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");
            $replace = explode(",", "a,o,c,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,A,A,A,A,A,E,E,E,E,I,I,I,I,O,O,O,O,U,U,U,U,C");
            
            return str_replace($search, $replace, $str);
        }
        
        
        /**
         * Descriptografada com Base64 3 vezes
         *
         * @param string $str
         *
         * @return string
         */
        public static function mycrypt_encode($str)
        {
            for ($i = 0; $i < 1; $i++) {
                $str = strrev(base64_encode($str));
            }
            
            return $str;
        }
        
        /**
         * Descriptografada com mycrypt_encode
         *
         * @param string $str
         *
         * @return string
         */
        public static function mycrypt_decode($str)
        {
            for ($i = 0; $i < 1; $i++) {
                $str = base64_decode(strrev($str));
            }
            
            return $str;
        }
        
        /**
         * @param $val
         * @param $mask
         *
         * @return string
         */
        public static function addMask($val, $mask)
        {
            $maskared = '';
            $k = 0;
            for ($i = 0; $i <= strlen($mask) - 1; $i++) {
                if ($mask[$i] == '#') {
                    if (isset($val[$k]))
                        $maskared .= $val[$k++];
                } else {
                    if (isset($mask[$i]))
                        $maskared .= $mask[$i];
                }
            }
            
            return $maskared;
        }
        
        public static function formatarMoedaAmericanaParaBrasileira($string)
        {
            if ($string != null) {
                return str_replace(".", ",", $string);
            }
        }
        
        public static function formatarMoedaBrasileira($valor)
        {
            return number_format($valor, 2, ',', '.');
        }
        public static function formatarMoedaAmericana($valor)
        {
            $valor = str_replace("R$ ", "", $valor);
            $valor = str_replace(".", "", $valor);
            $valor = str_replace(",", ".", $valor);
            $valor = str_replace(",", ".", $valor);
            return $valor;
        }
        
        
        public static function breakText($texto, $totalCaracteres)
        {
            if (strlen($texto) > $totalCaracteres) {
                return substr($texto, 0, $totalCaracteres - 1) . "...";
            } else {
                return $texto;
            }
        }
        
        //        public static function dayName($year, $month)
        //        {
        //            return date("t", mktime(0, 0, 0, $month, 1, $year));
        //        }
        
        public static function getDayOfWeek($ano, $mes, $dia)
        {
            switch (date("D", mktime(0, 0, 0, $mes, $dia, $ano))) {
                
                case "Sun":
                    return "DOM";
                    break;
                
                case "Mon":
                    return "SEG";
                    break;
                
                case "Tue":
                    return "TER";
                    break;
                
                case "Wed":
                    return "QUA";
                    break;
                
                case "Thu":
                    return "QUI";
                    break;
                
                case "Fri":
                    return "SEX";
                    break;
                
                case "Sat":
                    return "SAB";
                    break;
            }
        }
        
        public static function translateMonth($data)
        {
            // str_replace("o que voc? procura", "pelo que voc? quer trocar", "onde voc? quer trocar");
            $data = str_pad($data, 2, '0', STR_PAD_LEFT);
            $months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
            $meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
            
            return str_replace($months, $meses, $data);
        }
        
        public static function fixToBr($campo, $valor)
        {
            $campo = substr($campo, 0, 3);
            if ($campo == "dt_") {
                return DateUtils::DataParaString($valor);
            }
            if ($campo == "dh_") {
                return DateUtils::DataHoraParaString($valor);
            }
            
            return $valor;
        }
        
        public static function formatCnpjCpf($value)
        {
            $cnpj_cpf = preg_replace("/\D/", '', $value);
            
            if (strlen($cnpj_cpf) === 11) {
                return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
            }
            
            return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
        }
    }