<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Enrollment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="enroll-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList($usersList, ['prompt' => Yii::t('app', 'Select User'), 'class' => 'form-control autocomplete'])->label(Yii::t('app', 'User Name')) ?>

    <?= $form->field($model, 'course_id')->dropDownList($coursesList, ['prompt' => Yii::t('app', 'Select Course'), 'class' => 'form-control autocomplete'])->label(Yii::t('app', 'Module Name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJsFile('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerCssFile('https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css');
?>
<?php 
$this->registerJs("
$(document).ready(function() {
    var usersList = " . json_encode($usersList) . "; // Asegúrate de tener el array completo

    $('.autocomplete').autocomplete({
        source: Object.keys(usersList).map(function(key) {
            return usersList[key]; // Esto devuelve solo los nombres de usuario para autocompletar
        }),
        minLength: 2, // Mínimo de caracteres para iniciar la búsqueda
        select: function(event, ui) {
            var selectedId = Object.keys(usersList).find(key => usersList[key] === ui.item.value);
            $('#" . Html::getInputId($model, 'user_id') . "').val(selectedId);
        }
    });
});
");

?>