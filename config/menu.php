<?php
    return [
        'admin'     => [

            [
                'text' => 'Principal',
                'url'  => 'home',
                'icon' => 'fas fa-fw fa-home',
            ],

            ['header' => ''],

            [
                'text' => 'Vacinação',
                'icon' => 'fas fa-fw fa-plus',
                'url'  => 'vacinacoes',
            ]
            ,
            [
                'text'    => 'Administração',
                'icon'    => 'fas fa-fw fa-briefcase',
                'submenu' => [
                    [
                        'text' => 'Auditoria',
                        'url'  => 'audits',
                    ], [
                        'text' => 'Usuários',
                        'url'  => 'usuarios',
                    ],
                ],
            ],
            [
                'text'    => 'Gestão',
                'icon'    => 'fas fa-fw fa-newspaper',
                'submenu' => [
                    [
                        'text' => 'Cargos',
                        'url'  => 'cargos',
                    ], [
                        'text' => 'Locais de Trabalho',
                        'url'  => 'locais',
                    ],
                    [
                        'text' => 'Vacinas',
                        'url'  => 'vacinas',
                    ],
                ],
            ],
            [
                'text'    => 'Relatórios',
                'icon'    => 'fas fa-fw fa-print',
                'submenu' => [
                    [
                        'text' => 'Geral',
                        'url'  => 'relatorios/geral',
                    ],
                ],
            ]
        ],
        'digitacao' => [

            [
                'text' => 'Principal',
                'url'  => 'home',
                'icon' => 'fas fa-fw fa-home',
            ],

            ['header' => ''],

            [
                'text' => 'Vacinação',
                'icon' => 'fas fa-fw fa-plus',
                'url'  => 'vacinacoes',
            ]
        ],
        'externo'   => [

            [
                'text' => 'Principal',
                'url'  => 'home',
                'icon' => 'fas fa-fw fa-home',
            ],

            ['header' => ''],
            [
                'text'    => 'Relatórios',
                'icon'    => 'fas fa-fw fa-print',
                'submenu' => [
                    [
                        'text' => 'Geral',
                        'url'  => 'relatorios/geral',
                    ],
                ],
            ]

        ]


    ];