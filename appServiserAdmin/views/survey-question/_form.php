<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SurveyQuestion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="survey-question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'survey_id')->textInput() ?>

    <?php // $form->field($model, 'section_id')->textInput() ?>

    <?= $form->field($model, 'question_text')->textarea(['rows' => 3]) ?>

    <?php // $form->field($model, 'question_type')->dropDownList([ 'text' => 'Text', 'multiple_choice' => 'Multiple choice', 'checkbox' => 'Checkbox', 'true_false' => 'True false', 'open' => 'Open', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'question_type')->dropDownList(Yii::$app->params['question_types_es'], ['prompt' => '']) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'hint')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'explanation')->textarea(['rows' => 3]) ?>

    <?php // $form->field($model, 'media_type')->dropDownList([ 'image' => 'Image', 'video' => 'Video', 'none' => 'None', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'media_url')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput() ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
