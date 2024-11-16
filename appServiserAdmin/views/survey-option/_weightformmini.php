<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Option $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="modal-body">
        <?= Html::hiddenInput('form-name', 'surveyOptionWeightUpdate') ?>
        <?= $form->field($model, 'weight')->textInput() ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php $form = ActiveForm::end(); ?>
