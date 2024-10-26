<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = Yii::t('app', 'My personal info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member'), 'url' => ['member/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container profile-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary text-white', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#profileUpdate']) ?>
        <!-- <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <!-- Create Section Modal -->
    <div class="modal fade" id="profileUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="profielUpdateLabel"><?= Yii::t('app', 'Update Personal Info') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'profileUpdate') ?>
                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?><br>
                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?><br>
                <?= $form->field($model, 'gov_id_type')->dropDownList([
                    1 => 'Cédula de Ciudadanía',
                    2 => 'Cédula de Extranjería',
                    3 => 'Tarjeta de Identidad',
                    4 => 'Pasaporte',
                    5 => 'Registro Civil',
                ], ['prompt' => 'Seleccione el tipo de documento']) ?><br>
                <?= $form->field($model, 'gov_id')->textInput(['maxlength' => true]) ?><br>
                <?= $form->field($model, 'gender')->dropDownList([
                    'Masculino' => 'Masculino',
                    'Femenino' => 'Femenino',
                    'Otro' => 'Otro',
                ], ['prompt' => 'Seleccione su género']) ?><br>
                <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?><br>
                <?= $form->field($model, 'birth_date')->input('date') ?><br>
                <?= $form->field($model, 'visibility')->dropDownList([
                    '1' => Yii::t('app', 'Visible'),
                    '0' => Yii::t('app', 'Not Visible'),
                ]) ?>
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
    <!-- /. End of modal profile update  -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'user_id',
            'first_name',
            'last_name',
            [
                'attribute' => 'gov_id_type',
                'value' => function ($model) {
                    return $model->gov_id_type == null ? null : $model->govIdType->name;
                }
            ],
            'gov_id',
            'gender',
            'phone_number',
            [
                'attribute' => 'birth_date',
                'format' => ['date', 'php:d/m/Y'], // Formato DD/MM/AAAA
            ],
            [
                'attribute' => 'visibility',
                'value' => function ($model) {
                    return $model->visibility == 1 ? Yii::t('app', 'Visible') : Yii::t('app', 'Not Visible');
                }
            ],
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
