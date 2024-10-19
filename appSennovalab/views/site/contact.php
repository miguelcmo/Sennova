<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \servisena\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section>
    <div class="container-fluid d-flex align-items-center bg-opacity-25" style="background-image: url('images/backgrounds/feria-cafe.jpg'); background-position: center; height: 690px;">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col d-none d-md-block"><img class="img-fluid" src="images/logo(971x170).png" alt="Logo SennovaLab"/></div>
                <div class="col"><p class="text-white fs-5"><span class="fw-semibold">SENNOVA tiene el propósito de fortalecer los estándares de calidad y pertinencia,</span> 
                en las áreas de investigación, desarrollo tecnológico e innovación, de la formación profesional impartida en la Entidad.</p></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>Si tienes consultas u otras preguntas, por favor completa el siguiente formulario para contactarnos. Gracias.</p>
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => false]) ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'subject') ?>
                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="row d-flex align-items-center">
        <div class="col-md-7">
            <h1 class="text-uppercase fs-3 fw-semibold">Servicio nacional de aprendizaje SENA</h1>
            <h1 class="text-uppercase fs-4 fw-semibold">Dirección General</h1>
            <p>Calle 57 No. 8 - 69 Bogotá D.C. (Cundinamarca), Colombia</p>
            <p>El SENA brinda a la ciudadanía, atención presencial en las 33 Regionales y 117 Centros de Formación</p>
            <p><a href="https://www.sena.edu.co/es-co/transparencia/Paginas/mecanismosContacto.aspx">Conozca aquí los puntos de atención</a></p>
            <p>Líneas de atención al ciudadanos, empresarios y línea PQRS:Bogotá +(57) 601 736 60 60 - Línea gratuita y resto del país 018000 910270</p>
        </div>    
        <div class="col-md-5 pt-5">
            <img class="rounded-3 img-fluid" src="images/backgrounds/icontec-sena.png" alt="Carro robot Sennova"/>
        </div>
    </div>
</section>