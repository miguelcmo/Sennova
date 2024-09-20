<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
?>

<!-- Header Section -->
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top navbar-custom">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                <img src="images/logo(257x43).png" alt="Logo serviser">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?= Html::a('Inicio', ['site/index'], ['class' => 'nav-link active'], ['aria-current' => 'page']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Nosotros', ['site/about'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Asesoría aquí', ['site/about'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('ServiSENA', ['site/contact'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Indicadores', ['site/contact'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?php 
                            if (Yii::$app->user->isGuest) {
                                echo Html::tag('div',Html::a('Iniciar Sesión',['/site/login'],['class' => ['btn btn-outline-dark']]));
                            } else {
                                echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                                    . Html::submitButton(
                                        'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'nav-link']
                                    )
                                    . Html::endForm();
                            }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php if (Yii::$app->user->isGuest) {
                            echo Html::a('Registrarse', ['site/signup'], ['class' => 'btn btn-dark mx-2']);
                        } ?>   
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>