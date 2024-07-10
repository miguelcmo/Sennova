<aside class="main-sidebar sidebar-light-primary elevation-1 text-sm">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/logo.png" alt="ServiSer Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ServiSer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Miguel Angel Carrillo</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            /*
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            */
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [   
                        'label' => 'Dashboard',
                        'icon' => 'tachometer-alt',
                        //'icon' => 'bug',
                        //'iconStyle' => 'far',
                        //'badge' => '<span class="right badge badge-danger">New</span>',
                        //'url' => ['/gii'],
                        //'target' => '_blank',
                        //'items' => [], // same as first level
                        //'header' => true, // or false
                        //'iconClass' => 'nav-icon far fa-circle text-warning',
                        //'visible' => Yii::$app->user->isGuest,
                        //'iconClassAdded' => 'text-info',
                    ],
                    [
                        'label' => 'Cursos',
                        'icon' => 'book',
                        'items' => [
                            [
                                'label' => 'Gestión de Cursos',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Lecciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Evaluaciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Grupos',
                        'icon' => 'layer-group',
                        'items' => [
                            [
                                'label' => 'Matrícula',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Cursos',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Foros',
                        'icon' => 'comments',
                        'items' => [
                            [
                                'label' => 'Foros de Discución',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Temas de Discución',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Publicaciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Usuarios',
                        'icon' => 'user',
                        'items' => [
                            [
                                'label' => 'Gestión de Usuarios',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Roles y Permisos',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Calificaciones',
                        'icon' => 'star',
                        'items' => [
                            [
                                'label' => 'Libro de Calificaciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Reportes',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Contenidos',
                        'icon' => 'list-alt',
                        'items' => [
                            [
                                'label' => 'Anuncios',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Archivos',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Feedback',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Comunicación',
                        'icon' => 'volume-up',
                        'items' => [
                            [
                                'label' => 'Notificaciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Mensajes',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Planificación',
                        'icon' => 'ruler',
                        'items' => [
                            [
                                'label' => 'Calendario',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Monetización',
                        'icon' => 'dollar-sign',
                        'items' => [
                            [
                                'label' => 'Planes y Suscripciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Pagos',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Certificaciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Personalización',
                        'icon' => 'cog',
                        'items' => [
                            [
                                'label' => 'Temas',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Plugins',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Integraciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                            [
                                'label' => 'Configuraciones',
                                'iconStyle' => 'far',
                                //'url' => ['/gii'],
                            ],
                        ],
                    ],
                    ['label' => 'DevEnvTools', 'header' => true],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>