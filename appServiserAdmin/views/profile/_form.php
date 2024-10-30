<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gov_id_type')->dropDownList([
            1 => 'Cédula de Ciudadanía',
            2 => 'Cédula de Extranjería',
            3 => 'Tarjeta de Identidad',
            4 => 'Pasaporte',
            5 => 'Registro Civil',
        ], ['prompt' => 'Seleccione el tipo de documento']) ?>

    <?= $form->field($model, 'gov_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([
            'Masculino' => 'Masculino',
            'Femenino' => 'Femenino',
            'Otro' => 'Otro',
        ], ['prompt' => 'Seleccione su género']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->input('date') ?>

    <?php /* $form->field($model, 'visibility')->dropDownList([
            '1' => Yii::t('app', 'Visible'),
            '0' => Yii::t('app', 'Not Visible'),
        ]) */ ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput() ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
