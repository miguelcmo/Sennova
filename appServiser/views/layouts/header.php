<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
?>

<!-- Header Section -->
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container d-flex justify-content-between">
            <!-- logo brand  -->
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                <img src="images/logo(257x43).png" alt="Logo Serviser">
            </a>
            <!-- toggler button  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar  -->
            <div class="collapse navbar-collapse" id="navbarToggler">
                <!-- menu items  -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?= Html::a('Inicio', ['site/index'], ['class' => 'nav-link active'], ['aria-current' => 'page']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Nosotros', ['site/about'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Asesoría aquí', ['site/contact'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('ServiSENA', [''], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Indicadores', ['site/kpi'], ['class' => 'nav-link']); ?>
                    </li>
                    <!-- Boton Menu de usuario solo se muestra si el usuario esta logueado -->
                    <li class="nav-item">
                        <?php if (!Yii::$app->user->isGuest) {
                            echo Html::a('Menu usuario', ['#'], ['class' => 'btn btn-secondary']);
                        } ?>
                    </li>
                    <!-- Boton Iniciar sesion / Cerrar sesion cambia de acuerdo al si el usuario esta logueado o no -->
                    <li class="nav-item">
                        <?php 
                            if (Yii::$app->user->isGuest) {
                                echo Html::tag('div',Html::a('Iniciar Sesión',['/site/login'],['class' => ['btn btn-outline-dark']]));
                            } else {
                                echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                                    . Html::submitButton(
                                        'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-warning mx-2']
                                    )
                                    . Html::endForm();
                            }
                        ?>
                    </li>
                    <!-- Boton para registro solo se muestra si el usuario es guest -->
                    <li class="nav-item">
                        <?php if (Yii::$app->user->isGuest) {
                            echo Html::a('Registrarse', ['site/signup'], ['class' => 'btn btn-dark mx-2']);
                        } ?>   
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
</header>