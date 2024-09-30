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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column">
<?php $this->beginBody() ?>

<!-- Header Section -->
<?= $this->render('header') ?>

<!-- Content Section -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid px-0" style="padding-bottom: 0px;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!-- Footer Section -->
<?= $this->render('footer') ?>

<!-- Framework End Section  -->
<?php $this->endBody() ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- <script>
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
</script> -->
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

<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAFu6DKTJY1DlRMujPT503lu1WMiJOXeME",
    authDomain: "labserviser.firebaseapp.com",
    projectId: "labserviser",
    storageBucket: "labserviser.appspot.com",
    messagingSenderId: "919514822350",
    appId: "1:919514822350:web:201b4d2eb47361247d029f",
    measurementId: "G-396718P8G9"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</body>
</html>
<?php $this->endPage();
