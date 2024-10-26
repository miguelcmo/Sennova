<?php

use yii\helpers\Html;

?>
<aside class="main-sidebar sidebar-light-primary elevation-1 text-sm">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <!-- <img src="<?php //$assetDir ?>/img/logo.png" alt="ServiSer Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <img src="./images/logo(257x43).png" alt="Logo LabServiser" height="28px" />
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <!-- <a href="#" class="d-block">Miguel Angel Carrillo</a> -->
                <?= Html::a('Miguel Angel Carrillo', ['profile/index']) ?>
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
                        'url' => ['site/index'],
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
                    // Módulos
                    [
                        'label' => 'Módulos',
                        'icon' => 'book',
                        'items' => [
                            [
                                'label' => 'Gestión de Módulos',
                                'iconStyle' => 'far',
                                'url' => ['/course'],
                            ],
                            [
                                'label' => 'Temas',
                                'iconStyle' => 'far',
                                'url' => ['/lesson'],
                            ],
                        ],
                    ],
                    // Encuestas
                    [
                        'label' => 'Encuestas',
                        'icon' => 'poll',
                        'items' => [
                            [
                                'label' => 'Encuestas',
                                'iconStyle' => 'far',
                                'url' => ['/survey'],
                            ],
                            [
                                'label' => 'Preguntas',
                                'iconStyle' => 'far',
                                'url' => ['/question'],
                            ],
                        ],
                    ],
                    // Inscripción
                    [
                        'label' => 'Inscripción',
                        'icon' => 'check',
                        'items' => [
                            [
                                'label' => Yii::t('app', 'Enrollments'),
                                'iconStyle' => 'far',
                                'icon' => 'star',
                                'url' => ['/enrollment/index'],
                            ],
                            [
                                'label' => Yii::t('app', 'Enroll'),
                                'iconStyle' => 'far',
                                'url' => ['/enrollment/enroll'],
                            ],
                            [
                                'label' => Yii::t('app', 'Unenroll'),
                                'iconStyle' => 'far',
                                'url' => ['/enrollment/unenroll'],
                            ],
                        ],
                    ],
                    // Usuarios
                    [
                        'label' => 'Usuarios',
                        'icon' => 'users',
                        'items' => [
                            [
                                'label' => 'Gestión de Usuarios',
                                'iconStyle' => 'far',
                                'url' => ['/user'],
                            ],
                            [
                                'label' => 'Roles y Permisos',
                                'iconStyle' => 'far',
                                'items' => [
                                    [
                                        'label' => 'Roles',
                                        'iconStyle' => 'far',
                                        'icon' => 'dot-circle',
                                        'url' => ['/auth-item'],
                                    ],
                                    [
                                        'label' => 'Asignación',
                                        'iconStyle' => 'far',
                                        'icon' => 'dot-circle',
                                        'url' => ['/auth-assignment'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    /*
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
                                'label' => 'Grupos',
                                'iconStyle' => 'far',
                                'url' => ['/group'],
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
                                'url' => ['/discussion-forum'],
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
                                'url' => ['/announcement'],
                            ],
                            [
                                'label' => 'Archivos',
                                'iconStyle' => 'far',
                                'url' => ['/file'],
                            ],
                            [
                                'label' => 'Feedback',
                                'iconStyle' => 'far',
                                'url' => ['/feedback'],
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
                                'items' => [
                                    [
                                        'label' => 'Otras Configuraciones',
                                        //'iconStyle' => 'far',
                                        'icon' => 'dot-circle'
                                        //'url' => ['/gii'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    */
                    ['label' => 'DevEnvTools', 'header' => true],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ]
            ]);
            
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>