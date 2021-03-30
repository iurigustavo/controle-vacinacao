<?php


    namespace Database\Seeders;


    use Illuminate\Database\Seeder;
    use App\Models\User;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;

    class CreateAdminUserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $user = User::create([
                'name'     => 'Administrador',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'enabled' => 1
            ]);

            $role = Role::query()->where('name', 'admin')->first();

            $user->assignRole([$role->id]);
        }
    }