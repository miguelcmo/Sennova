<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Section $model */

use common\models\Question;
// use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
// /** @var yii\web\View $this */
/** @var common\models\QuestionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// use yii\helpers\Html;
use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\Question $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="section-view">

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
            [
                'attribute' => 'survey_id',
                'value' => function($model) {
                    return $model->survey->title; // Accede al título del Survey relacionado
                },
            ],
            'title',
            'description:ntext',
            'order',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
        ],
    ]) ?>

</div>

<div class="question-index">

    <h4><?= Yii::t('app', 'Section questions') ?></h4>

    <!-- Button trigger modal -->
    <p>
        <?= Html::a(Yii::t('app', 'Create Question'), ['question/create'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#questionCreate']) ?>
    </p>

    <!-- Double Modal -->
    <div class="modal fade" id="questionCreate" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="questionCreateLabel" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="questionCreateLabel"><?= Yii::t('app', 'Create Question'); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <?php $form = ActiveForm::begin(); ?>
                <div class="modal-body">
                    <?= $form->field($questionModel, 'question_text')->textarea(['rows' => 6]) ?>
                    <?= $form->field($questionModel, 'question_type')->dropDownList([ 'text' => 'Text', 'multiple_choice' => 'Multiple choice', 'checkbox' => 'Checkbox', 'true_false' => 'True false', 'open' => 'Open', ], ['prompt' => '']) ?>
                    <?= $form->field($questionModel, 'points')->textInput() ?>
                    <?= $form->field($questionModel, 'hint')->textarea(['rows' => 6]) ?>
                    <?= $form->field($questionModel, 'explanation')->textarea(['rows' => 6]) ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#questionCreate2" data-bs-toggle="modal">Open second modal</button>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php $form = ActiveForm::end(); ?>
            
            </div>
        </div>
    </div>
    <div class="modal fade" id="questionCreate2" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="questionCreateLabel2" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="questionCreateLabel2">Modal 2</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#questionCreate" data-bs-toggle="modal">Back to first</button>
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
            //'section_id',
            'question_text:ntext',
            'question_type',
            'points',
            //'hint:ntext',
            //'explanation:ntext',
            //'media_type',
            //'media_url:url',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Question $model, $key, $index, $column) {
                    return Url::toRoute(['question/'.$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
