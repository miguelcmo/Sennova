<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use servisena\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

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
</head>
<body class="d-flex flex-column">
<?php $this->beginBody() ?>

<?php /*
<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>
*/ ?>
<div class="sticky-top bg-white">
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
      <div class="">
        <a href="#" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="./images/logo-288x40.png" alt="Logo Servisena" width="288px">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <!--<li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>-->
        <li><a href="#proyectos" class="nav-link px-2 text-dark">Proyectos</a></li>
        <li><a href="#galeria" class="nav-link px-2 text-dark">Galeria</a></li>
        <li><a href="#nosotros" class="nav-link px-2 text-dark">Nosotros</a></li>
        <!--<li><a href="#" class="nav-link px-2">About</a></li>-->
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-dark me-2">Iniciar Sesión</button>
        <button type="button" class="btn btn-dark">Registrarse</button>
      </div>
      <style>
        .zoom-hover {
            overflow: hidden;
        }
        .zoom-hover img {
            transition: transform 0.4s ease;
        }

        .zoom-hover:hover img {
            transform: scale(1.1);
        }
        #scrollToTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            z-index: 99;
        }
      </style>
    </header>
</div>
<hr class="my-0">
</div>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!--
<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>
-->
<div class="container">
  <footer class="py-5">
    <div class="row">
      <!-- <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div> -->
      
        <div class="col-md-7 mb-3">
            <div class="">
                <a href="#" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="./images/logo-288x40.png" alt="Logo Servisena" width="288px">
                </a>
            </div><br>
            <p class="lead">Servicio Nacional de Aprendizaje<br>
                Centro de Comercio<br>
                Regional Antioquia<br>
                Calle 51 No. 57-70, Torre Sur, Piso 5<br>
                Medellín<br>
                Teléfono 8391918 Ext. 43689
            </p>
        </div>

        <div class="col-md-5 mb-3">
            <form>
            <h5>Suscríbete a nuestro boletín</h5>
            <p>Resumen mensual de nuestras novedades y novedades.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Dirección de correo electrónico</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Dirección de correo electrónico">
                <button class="btn btn-dark" type="button">Suscribir</button>
            </div>
            </form>
        </div>
    </div>
    </footer>
</div>
    <hr>
<div class="container">
    <footer>
    <div class="d-flex flex-column flex-sm-row justify-content-between py-2 my-2">
      <p>&copy; 2024 Servisena, Todos los derechos reservados.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</div>

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
</body>
</html>
<?php $this->endPage();
