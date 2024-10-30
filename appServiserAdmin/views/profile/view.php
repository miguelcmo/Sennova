<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model->full_name != null ? $model->full_name : Yii::$app->user->identity->username;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['#'], ['class' => 'btn btn-primary', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#profileUpdate']) ?>
        <!-- <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <!-- Update Course Modal -->
    <div class="modal fade" id="profileUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="profileUpdateLabel"><?= Yii::t('app', 'Update Profile') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'profileUpdate') ?>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php $form = ActiveForm::end(); ?>
        </div>
    </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'last_name',
            'full_name',
            [
                'attribute' => 'gov_id_type',
                'value' => function ($model) {
                    return $model->gov_id_type == null ? null : $model->govIdType->name;
                }
            ],
            'gov_id',
            'gender',
            'phone_number',
            'birth_date:date',
            //'visibility',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
