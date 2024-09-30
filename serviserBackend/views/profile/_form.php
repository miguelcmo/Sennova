<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var pms\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'govTypeId')->dropDownList(Yii::$app->params['govType'], ['prompt' => '-- Seleccione una opción --']) ?>

    <?= $form->field($model, 'govId')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList(Yii::$app->params['gender'], ['prompt' => '-- Seleccione una opción --']) ?>

    <?= $form->field($model, 'telephone')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['value' => $model->email, 'readonly' => 'true']) ?>

    <?= $form->field($model, 'role')->dropDownList(['2' => 'Internal User - Expert', '3' => 'External User'], ['prompt' => '-- Seleccione una opción --']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
