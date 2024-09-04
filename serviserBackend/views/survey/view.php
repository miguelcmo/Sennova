<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Survey $model */

use common\models\Section;
// use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
// /** @var yii\web\View $this */
/** @var common\models\SectionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// use yii\helpers\Html;
use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\Section $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="survey-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'description:ntext',
            'total_points',
            'status',
            'url:url',
            //'created_by',
            //'updated_by',
            'created_at:datetime',
            //'updated_at',
        ],
    ]) ?>

</div>

<div class="section-index">

    <h4><?= Yii::t('app', 'Survey sections') ?></h4>

    <!-- Button trigger modal -->
    <p>
        <?= Html::a(Yii::t('app', 'Create Section'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#sectionCreate']) ?>
    </p>

    <!-- Modal -->
    <div class="modal fade" id="sectionCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sectionCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sectionCreateLabel"><?= Yii::t('app', 'Create Section') ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="section-form">
                    <?php $form = ActiveForm::begin(); ?>  
                    <div class="modal-body">
                        <?= $form->field($sectionModel, 'title')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($sectionModel, 'description')->textarea(['rows' => 6]) ?>
                        <?= $form->field($sectionModel, 'order')->textInput() ?>
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
            //'survey_id',
            'title',
            'description:ntext',
            'order',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Section $model, $key, $index, $column) {
                    return Url::toRoute(['section/'.$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
