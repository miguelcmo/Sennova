<?php

use common\models\Survey;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\SurveySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// imports for form
// use yii\helpers\Html;
use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\Survey $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = Yii::t('app', 'Surveys');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- Button trigger modal -->
    <p>
        <?= Html::a(Yii::t('app', 'Create Survey'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#surveyCreate']) ?>
    </p>

    <!-- Modal -->
    <div class="modal fade" id="surveyCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="surveyCreateLabel"><?= Yii::t('app', 'Create Survey') ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="survey-form">
            <?php $form = ActiveForm::begin(); ?>  
            <div class="modal-body">    
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'total_points')->textInput() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        </div>
    </div>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'description:ntext',
            'total_points',
            //'status',
            //'url:url',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Survey $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>




</div>
