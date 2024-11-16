<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Course $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="modal-body">
        <?= Html::hiddenInput('form-name', 'surveyQuestionUpdate') ?>
        <?= $form->field($model, 'question_text')->textarea(['rows' => 3]) ?>
        <?php // $form->field($model, 'question_type')->dropDownList(Yii::$app->params['question_types_es'], ['prompt' => '']) ?>
        <?= $form->field($model, 'points')->textInput() ?>
        <?= $form->field($model, 'hint')->textarea(['rows' => 3]) ?>
        <?= $form->field($model, 'explanation')->textarea(['rows' => 3]) ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php $form = ActiveForm::end(); ?>
