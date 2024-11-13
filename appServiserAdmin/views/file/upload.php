<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FileUpload */

?>

<h3>Subir Archivo</h3>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'] // Necesario para cargar archivos
]); ?>

<?= $form->field($model, 'file')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Subir', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
