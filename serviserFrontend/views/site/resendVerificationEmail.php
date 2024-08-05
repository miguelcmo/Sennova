<?php

/** @var yii\web\View$this  */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Reenviar correo de verificación';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-resend-verification-email py-5" style="min-height: 700px;">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, ingrese su correo electrónico. Se enviará un correo de verificación a esa dirección.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Enviar', ['class' => 'btn btn-dark']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
