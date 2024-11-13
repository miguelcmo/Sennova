<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SurveyQuestionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="survey-question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'survey_id') ?>

    <?= $form->field($model, 'section_id') ?>

    <?= $form->field($model, 'question_text') ?>

    <?= $form->field($model, 'question_type') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'hint') ?>

    <?php // echo $form->field($model, 'explanation') ?>

    <?php // echo $form->field($model, 'media_type') ?>

    <?php // echo $form->field($model, 'media_url') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
