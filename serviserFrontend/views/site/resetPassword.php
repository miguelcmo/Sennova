<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Restablecer contraseña';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password py-5" style="min-height: 700px;">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, elige tu nueva contraseña:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-dark']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
