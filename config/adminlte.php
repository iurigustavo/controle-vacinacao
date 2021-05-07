<?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        |
        | Here you can change the default title of your admin panel.
        |
        | For detailed instructions you can look the title section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'title'         => env('APP_NAME'),
        'title_prefix'  => '',
        'title_postfix' => '',

        /*
        |--------------------------------------------------------------------------
        | Favicon
        |--------------------------------------------------------------------------
        |
        | Here you can activate the favicon.
        |
        | For detailed instructions you can look the favicon section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'use_ico_only'     => FALSE,
        'use_full_favicon' => false,

        /*
        |--------------------------------------------------------------------------
        | Logo
        |--------------------------------------------------------------------------
        |
        | Here you can change the logo of your admin panel.
        |
        | For detailed instructions you can look the logo section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'logo'              => '<b>Vacinação</b>',
        'logo_img'          => 'vendor/adminlte/dist/img/AdminLTELogo.png',
        'logo_img_class'    => 'brand-image img-circle elevation-3',
        'logo_img_xl'       => NULL,
        'logo_img_xl_class' => 'brand-image-xs',
        'logo_img_alt'      => 'Vacinação',

        /*
        |--------------------------------------------------------------------------
        | User Menu
        |--------------------------------------------------------------------------
        |
        | Here you can activate and change the user menu.
        |
        | For detailed instructions you can look the user menu section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'usermenu_enabled'      => TRUE,
        'usermenu_header'       => TRUE,
        'usermenu_header_class' => 'bg-primary',
        'usermenu_image'        => FALSE,
        'usermenu_desc'         => FALSE,
        'usermenu_profile_url'  => FALSE,

        /*
        |--------------------------------------------------------------------------
        | Layout
        |--------------------------------------------------------------------------
        |
        | Here we change the layout of your admin panel.
        |
        | For detailed instructions you can look the layout section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'layout_topnav'        => NULL,
        'layout_boxed'         => NULL,
        'layout_fixed_sidebar' => NULL,
        'layout_fixed_navbar'  => NULL,
        'layout_fixed_footer'  => NULL,

        /*
        |--------------------------------------------------------------------------
        | Authentication Views Classes
        |--------------------------------------------------------------------------
        |
        | Here you can change the look and behavior of the authentication views.
        |
        | For detailed instructions you can look the auth classes section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'classes_auth_card'   => 'card-outline card-primary',
        'classes_auth_header' => '',
        'classes_auth_body'   => '',
        'classes_auth_footer' => '',
        'classes_auth_icon'   => '',
        'classes_auth_btn'    => 'btn-flat btn-primary',

        /*
        |--------------------------------------------------------------------------
        | Admin Panel Classes
        |--------------------------------------------------------------------------
        |
        | Here you can change the look and behavior of the admin panel.
        |
        | For detailed instructions you can look the admin panel classes here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'classes_body'             => '',
        'classes_brand'            => '',
        'classes_brand_text'       => '',
        'classes_content_wrapper'  => '',
        'classes_content_header'   => '',
        'classes_content'          => '',
        'classes_sidebar'          => 'sidebar-dark-primary elevation-4',
        'classes_sidebar_nav'      => '',
        'classes_topnav'           => 'navbar-white navbar-light',
        'classes_topnav_nav'       => 'navbar-expand',
        'classes_topnav_container' => 'container',

        /*
        |--------------------------------------------------------------------------
        | Sidebar
        |--------------------------------------------------------------------------
        |
        | Here we can modify the sidebar of the admin panel.
        |
        | For detailed instructions you can look the sidebar section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'sidebar_mini'                            => TRUE,
        'sidebar_collapse'                        => FALSE,
        'sidebar_collapse_auto_size'              => FALSE,
        'sidebar_collapse_remember'               => FALSE,
        'sidebar_collapse_remember_no_transition' => TRUE,
        'sidebar_scrollbar_theme'                 => 'os-theme-light',
        'sidebar_scrollbar_auto_hide'             => 'l',
        'sidebar_nav_accordion'                   => TRUE,
        'sidebar_nav_animation_speed'             => 300,

        /*
        |--------------------------------------------------------------------------
        | Control Sidebar (Right Sidebar)
        |--------------------------------------------------------------------------
        |
        | Here we can modify the right sidebar aka control sidebar of the admin panel.
        |
        | For detailed instructions you can look the right sidebar section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
        |
        */

        'right_sidebar'                     => FALSE,
        'right_sidebar_icon'                => 'fas fa-cogs',
        'right_sidebar_theme'               => 'dark',
        'right_sidebar_slide'               => TRUE,
        'right_sidebar_push'                => TRUE,
        'right_sidebar_scrollbar_theme'     => 'os-theme-light',
        'right_sidebar_scrollbar_auto_hide' => 'l',

        /*
        |--------------------------------------------------------------------------
        | URLs
        |--------------------------------------------------------------------------
        |
        | Here we can modify the url settings of the admin panel.
        |
        | For detailed instructions you can look the urls section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
        |
        */

        'use_route_url'      => FALSE,
        'dashboard_url'      => 'home',
        'logout_url'         => 'logout',
        'login_url'          => 'login',
        'register_url'       => FALSE,
        'password_reset_url' => 'password/reset',
        'password_email_url' => 'password/email',
        'profile_url'        => TRUE,

        /*
        |--------------------------------------------------------------------------
        | Laravel Mix
        |--------------------------------------------------------------------------
        |
        | Here we can enable the Laravel Mix option for the admin panel.
        |
        | For detailed instructions you can look the laravel mix section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
        |
        */

        'enabled_laravel_mix'  => FALSE,
        'laravel_mix_css_path' => 'css/app.css',
        'laravel_mix_js_path'  => 'js/app.js',

        /*
        |--------------------------------------------------------------------------
        | Menu Items
        |--------------------------------------------------------------------------
        |
        | Here we can modify the sidebar/top navigation of the admin panel.
        |
        | For detailed instructions you can look here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
        |
        */

        'menu' => [],

        /*
        |--------------------------------------------------------------------------
        | Menu Filters
        |--------------------------------------------------------------------------
        |
        | Here we can modify the menu filters of the admin panel.
        |
        | For detailed instructions you can look the menu filters section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
        |
        */

        'filters' => [
            JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
        ],

        /*
        |--------------------------------------------------------------------------
        | Plugins Initialization
        |--------------------------------------------------------------------------
        |
        | Here we can modify the plugins used inside the admin panel.
        |
        | For detailed instructions you can look the plugins section here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
        |
        */

        'plugins' => [
            'Datatables'  => [
                'active' => false,
                'files'  => [
                    [
                        'type'     => 'js',
                        'asset'    => FALSE,
                        'location' => '//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
                    ],
                    [
                        'type'     => 'js',
                        'asset'    => FALSE,
                        'location' => '//cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js',
                    ],
                    [
                        'type'     => 'css',
                        'asset'    => FALSE,
                        'location' => '//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
                    ],
                ],
            ],
            'Select2'     => [
                'active' => TRUE,
                'files'  => [
                    [
                        'type'     => 'js',
                        'asset'    => FALSE,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                    ],
                    [
                        'type'     => 'css',
                        'asset'    => FALSE,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                    ],
                ],
            ],
            'Chartjs'     => [
                'active' => FALSE,
                'files'  => [
                    [
                        'type'     => 'js',
                        'asset'    => FALSE,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                    ],
                ],
            ],
            'Sweetalert2' => [
                'active' => FALSE,
                'files'  => [
                    [
                        'type'     => 'js',
                        'asset'    => FALSE,
                        'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                    ],
                ],
            ],
            'Pace'        => [
                'active' => FALSE,
                'files'  => [
                    [
                        'type'     => 'css',
                        'asset'    => FALSE,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                    ],
                    [
                        'type'     => 'js',
                        'asset'    => FALSE,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Livewire
        |--------------------------------------------------------------------------
        |
        | Here we can enable the Livewire support.
        |
        | For detailed instructions you can look the livewire here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
        */

        'livewire' => FALSE,
    ];
