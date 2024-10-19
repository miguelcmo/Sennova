<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \servisena\models\ContactForm $model */

//use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = 'Contacto';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div class="container-fluid d-flex align-items-center bg-opacity-25" style="background-image: url('images/backgrounds/proyectos.jpg'); background-position: center; height: 690px;">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col d-none d-md-block">
                    <img class="img-fluid" src="images/logo(971x170).png" alt="Logo SennovaLab"/>
                </div>
                <div class="col">
                    <h1 class="text-light fs-3 fw-semibold">Conoce nuestros Proyectos</h1>
                    <p class="text-light fs-5">En SENNOVA, estamos comprometidos con la innovación y el desarrollo tecnológico para transformar ideas en soluciones reales. En esta sección, encontrarás una selección de los proyectos más destacados que estamos liderando, cada uno enfocado en fortalecer el conocimiento, impulsar la investigación y fomentar la colaboración para enfrentar los desafíos del futuro.</p>
                    <p class="text-light fs-5">Explora nuestras iniciativas y descubre cómo estamos contribuyendo al crecimiento de las industrias a través de la ciencia, la tecnología y la servitización. ¡Juntos, construimos el futuro!</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <!-- Proyecto 1  -->
    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis">FEI</h1>
                <p class="lead">El proyecto <span class="fw-semibold">FEI</span> (Formación y Entrenamiento para la Innovación) tiene como objetivo capacitar y entrenar a profesionales y estudiantes en herramientas y metodologías de innovación que promuevan el desarrollo de soluciones creativas y tecnológicas dentro de diversas industrias. A través de programas de formación especializados, <span class="fw-semibold">FEI</span> busca fortalecer las competencias de los participantes en investigación, desarrollo de prototipos y gestión de la innovación, impulsando así la competitividad en el ámbito nacional e internacional.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <!-- <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button> -->
                <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
                    <?= Html::a('Acceder al proyecto', ['#'], ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
            </div>
            <div class="col-lg-5 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="https://placehold.co/600x400?text=FEI" alt="Proyecto FEI" loading="lazy">
            </div>
        </div>
    </div>
    <!-- Proyecto 2  -->
    <div class="container my-5"> 
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis">ServiSER</h1>
                <p class="lead"><span class="fw-semibold">ServiSER</span> es una plataforma diseñada para apoyar a las empresas en su transición hacia la servitización, un modelo en el que los servicios se integran con los productos para ofrecer soluciones completas y personalizadas a los clientes. Este proyecto permite a las organizaciones gestionar, desarrollar y optimizar sus procesos de servitización mediante módulos de formación, herramientas de diagnóstico y recursos de mejora continua, fomentando una mayor eficiencia y valor agregado en sus operaciones.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <!-- <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button> -->
                <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
                    <?= Html::a('Acceder al proyecto', 'https://serviser.datasena.com/labserviser', ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
            </div>
            <div class="col-lg-5 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="https://placehold.co/600x400?text=ServiSER" alt="Proyecto ServiSER" loading="lazy">
            </div>
        </div>
    </div>
    <!-- Proyecto 3  -->
    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Congreso/Simposio</h1>
                <p class="lead">El <span class="fw-semibold">Congreso/Simposio de SENNOVA</span> es un espacio anual donde expertos, investigadores y líderes del sector comparten avances, investigaciones y tendencias en ciencia, tecnología e innovación. Este evento fomenta el intercambio de conocimientos, la creación de redes y el fortalecimiento de alianzas estratégicas entre instituciones académicas, centros de investigación y empresas. A través de conferencias, paneles y exposiciones, el congreso busca ser un referente en el impulso del desarrollo científico y tecnológico en la región.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <!-- <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button> -->
                <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
                    <?= Html::a('Acceder al proyecto', [''], ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
            </div>
            <div class="col-lg-5 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="https://placehold.co/600x400?text=Congreso/Simposio" alt="Proyecto Congreso/Simposio" loading="lazy">
            </div>
        </div>
    </div>
    <!-- Proyecto 4  -->
    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Cienciometrik</h1>
                <p class="lead">El proyecto <span class="fw-semibold">Cienciometrik</span> se centra en la medición y análisis del impacto de la ciencia y la tecnología en el desarrollo económico y social. A través de indicadores cienciométricos, este proyecto estudia el desempeño de investigadores, instituciones y programas, proporcionando datos precisos y herramientas para la toma de decisiones estratégicas en la gestión de la investigación. <span class="fw-semibold">Cienciometrik</span> busca optimizar la asignación de recursos y fortalecer la innovación basada en evidencia científica.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <!-- <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button> -->
                <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
                    <?= Html::a('Acceder al proyecto', ['#'], ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
            </div>
            <div class="col-lg-5 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="https://placehold.co/600x400?text=Cienciometrik" alt="Proyecto Cienciometrik" loading="lazy">
            </div>
        </div>
    </div>
</section>