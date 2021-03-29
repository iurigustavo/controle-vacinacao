<?php

    namespace App\Providers;

    use App\Models\User;
    use Illuminate\Contracts\Events\Dispatcher;
    use Illuminate\Support\Facades\Auth;
    use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
    use Illuminate\Support\ServiceProvider;
    use RealRashid\SweetAlert\Facades\Alert;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            //
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot(Dispatcher $events)
        {
            $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
                // Add some items to the menu...
                $role  = 'menu.'.auth()->user()->getRoleNames()[0];
                $menus = config($role);
                if ($menus !== NULL) {
                    foreach ($menus as $menu) {
                        $event->menu->add($menu);
                    }
                }
            });
        }
    }
