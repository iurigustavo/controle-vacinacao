<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Role;

    class RolesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $roles =
                [
                    ['name' => 'admin'],
                    ['name' => 'digitacao'],
                    ['name' => 'externo'],
                ];

            foreach ($roles as $role) {
                Role::create($role);
            }

        }
    }
