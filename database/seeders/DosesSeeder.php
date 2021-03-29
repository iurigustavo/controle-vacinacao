<?php

    namespace Database\Seeders;

    use App\Models\Dose;
    use Illuminate\Database\Seeder;

    class DosesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $doses = [
                [
                    'descricao' => '1ª Dose',
                ],
                [
                    'descricao' => '2ª Dose',
                ]
            ];
            foreach ($doses as $dose) {
                Dose::create($dose);
            }

        }
    }
