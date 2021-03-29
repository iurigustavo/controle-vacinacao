<?php


    namespace App\Http\Helpers;

    use Eloquent;
    use Illuminate\Database\Eloquent\Model;

    class FormUtils
    {

        /**
         * @param Model|String                          $model
         * @param                                       $key
         * @param                                       $desc
         *
         * @return array
         */
        public static function pluckIdDescWithEmpty($model, $key, $desc)
        {

            return ["" => "---"] + self::pluckIdDesc($model, $key, $desc);
        }

        /**
         * @param Model                                 $model
         * @param                                       $key
         * @param                                       $desc
         *
         * @return array
         */
        public static function pluckIdDesc($model, $key, $desc)
        {
            return $model::query()->pluck($desc, $key)->toArray();
        }

        /**
         * @param string $enabled
         * @param string $disabled
         *
         * @return array
         */
        public static function pluckEnabledDisabled($enabled = 'Enabled', $disabled = 'Disabled')
        {
            return ["" => "---", 1 => $enabled, 0 => $disabled];
        }

    }