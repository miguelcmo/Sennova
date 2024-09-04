<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Question $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section_id')->textInput() ?>

    <?= $form->field($model, 'question_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'question_type')->dropDownList([ 'text' => 'Text', 'multiple_choice' => 'Multiple choice', 'checkbox' => 'Checkbox', 'true_false' => 'True false', 'open' => 'Open', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'hint')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'explanation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'media_type')->dropDownList([ 'image' => 'Image', 'video' => 'Video', 'none' => 'None', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'media_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
