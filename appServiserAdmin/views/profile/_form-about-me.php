<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var pms\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'education')->textInput() ?>
    
    <?= $form->field($model, 'location')->dropDownList(Yii::$app->params['city'], ['prompt' => '-- Selecciona una ciudad --']) ?>

    <?= $form->field($model, 'skills')->textInput() ?>

    <?= $form->field($model, 'notes')->textArea() ?>

    <?php // $form->field($model, 'createdAt')->textInput() ?>

    <?php // $form->field($model, 'createdBy')->textInput() ?>

    <?php // $form->field($model, 'updatedAt')->textInput() ?>

    <?php // $form->field($model, 'updatedBy')->textInput() ?>

    <?php // $form->field($model, 'status')->textInput() ?>

    <?php // $form->field($model, 'flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
