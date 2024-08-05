<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use serviserFrontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
//use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column">
<?php $this->beginBody() ?>

<style>
    .navbar-custom {
        height: 80px;
        /* transition: background-color 0.5s ease, opacity 0.5s ease;
        background-color: rgba(241, 145, 75, 0.2); */
        box-shadow: 0px 1px 3px #888888;
    }
    .navbar-custom.scrolled {
        background-color: #F1914B;
        opacity: 1;
    }
    .footer {
        position: relative;
        width: 100%;
        background: #f1914b;
        min-height: 100px;
        padding: 20px 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: fit-content;
    }
    .footer-menu {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px 0;
        flex-wrap: wrap;
    }
    .wave {
        position: absolute;
        top: -36px;
        left: 0;
        width: 100%;
        height: 36px;
        background: url("images/fondo.png");
        background-size: 982px 36px;
    }

    .wave#wave1 {
        z-index: 1000;
        opacity: 1;
        bottom: 0;
        animation: animateWaves 30s linear infinite;
    }

    .wave#wave2 {
        z-index: 999;
        opacity: 0.5;
        bottom: 10px;
        animation: animate 40s linear infinite !important;
    }

    .wave#wave3 {
        z-index: 1000;
        opacity: 0.2;
        bottom: 15px;
        animation: animateWaves 16s linear infinite;
    }

    .wave#wave4 {
        z-index: 999;
        opacity: 0.7;
        bottom: 20px;
        animation: animate 6s linear infinite;
    }

    @keyframes animateWaves {
        0% {
            background-position-x: 1000px;
        }
        100% {
            background-positon-x: 0px;
        }
    }

    @keyframes animate {
        0% {
            background-position-x: -1000px;
        }
        100% {
            background-positon-x: 0px;
        }
    }
</style>

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
                    <?= Html::a('Contacto', ['site/contact'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?php if (Yii::$app->user->isGuest) {
                            echo Html::a('Registrarse', ['site/signup'], ['class' => 'nav-link']);
                        } ?>   
                    </li>
                    <li class="nav-item">
                        <?php 
                            if (Yii::$app->user->isGuest) {
                                echo Html::tag('div',Html::a('Iniciar Sesión',['/site/login'],['class' => ['nav-link']]),['class' => ['d-flex']]);
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
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Content Section -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- Footer Section -->
<footer class="footer">
    <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-6 col-md-2 mb-3 navbar-light">
            <h5>Sobre Nosotros</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><?= Html::a('Inicio', ['site/index'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                <li class="nav-item mb-2"><?= Html::a('Nuestra Historia', ['site/about'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                <li class="nav-item mb-2"><?= Html::a('Nuestro Equipo', ['site/about'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Valores</a></li>
                <li class="nav-item mb-2"><?= Html::a('Contacto', ['site/contact'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
            </ul>
        </div>
        <div class="col-6 col-md-2 mb-3">
            <h5>Servicios</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Servitización</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Consultoría</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Capacitación</a></li>
                <li class="nav-item mb-2"><a href="#proceso" class="nav-link p-0 text-body-secondary">Preguntas Frecuentes</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Soporte</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-2 mb-3">
            <h5>Recursos</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Blog</a></li>
                <li class="nav-item mb-2"><a href="#testimonio" class="nav-link p-0 text-body-secondary">Casos de Éxito</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">E-books</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Webinars</a></li>
            </ul>
        </div>
        <div class="col-md-6 mb-3">
            <div class="mb-4 d-flex justify-content-center align-items-center">
                <img src="images/logo-sena.svg" width="80px" alt="Logo SENA">
                <h5 class="mx-3">Servicio Nacional de Aprendizaje SENA</h5>
            </div>
            <form>
            <h5>Suscríbete a Nuestro Newsletter</h5>
            <p>Mantente informado con las últimas noticias y actualizaciones directamente en tu bandeja de entrada.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Correo electrónico</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-dark" type="button">Suscribirse</button>
            </div>
            </form>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p class="align-self-center">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?> - Developed by MACM</p>
            <ul class="list-unstyled d-flex align-self-center">
                <li class="nav-item mb-2 ms-3"><a href="#" class="nav-link p-0 text-body-secondary">Términos y Condiciones</a></li>
                <li class="nav-item mb-2 ms-3"><a href="#" class="nav-link p-0 text-body-secondary">Política de Privacidad</a></li>
            </ul>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="bi bi-twitter-x" style="font-size: 2rem;"></i></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="bi bi-instagram" style="font-size: 2rem;"></i></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="bi bi-facebook" style="font-size: 2rem;"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Framework End Section  -->
<?php $this->endBody() ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    // Mostrar el botón cuando el usuario se desplaza hacia abajo 100px desde la parte superior del documento
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("scrollToTopBtn").style.display = "block";
        } else {
            document.getElementById("scrollToTopBtn").style.display = "none";
        }
    }

    // Cuando el usuario hace clic en el botón, desplázate hacia la parte superior del documento
    document.getElementById('scrollToTopBtn').addEventListener('click', function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navbar = document.querySelector('.navbar-custom');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) { // Cambia el valor según cuando quieras que ocurra el cambio
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>
</body>
</html>
<?php $this->endPage();
