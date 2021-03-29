<?php

    namespace Database\Seeders;

    use App\Models\Raca;
    use Illuminate\Database\Seeder;

    class RacasSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $racas = [
                [
                    'descricao' => 'Branca',
                ],
                [
                    'descricao' => 'Preta',
                ],
                [
                    'descricao' => 'Parda',
                ],
                [
                    'descricao' => 'Amarela',
                ],
                [
                    'descricao' => 'Indígena',
                ]
            ];
            foreach ($racas as $raca) {
                Raca::create($raca);
            }
        }
    }
