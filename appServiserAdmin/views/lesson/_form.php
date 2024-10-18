<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    @import url("./ckeditor/ckeditor5/ckeditor5.css");
</style>

<script type="importmap">
    {
        "imports": {
            "ckeditor5": "./ckeditor/ckeditor5/ckeditor5.js",
            "ckeditor5/": "./ckeditor/ckeditor5/"
        }
    }
</script>

<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course_module_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textArea(['id' => 'editor', 'placeholder' => 'Loading Editor...']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script type="module" src="ckeditor/editor.js"></script>
