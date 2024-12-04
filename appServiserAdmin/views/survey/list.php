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

$this->title = Yii::t('app', 'Survey Previews');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-index">

    <!-- Verifica si hay algún mensaje flash y muéstralo  -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success flash-message">
            <?= Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger flash-message">
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- Survey Preview Modal -->
    <div class="modal fade" id="surveyPreview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyPreviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="surveyPreviewLabel"><?= Yii::t('app', 'Create Survey') ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="survey-form">
            <?php $form = ActiveForm::begin(); ?>  
            <div class="modal-body">    
                
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
        //'filterModel' => $searchModel,
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
                'template' => '{preview}',
                'header' => Yii::t('app', 'Actions'),
                'contentOptions' => ['style' => 'width: 100px; text-align: center;'], // Aumenta el ancho de la columna
                'buttons' => [
                    'preview' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-poll-h" style="font-size:20px;"></i>', ['preview', 'id' => $model->id], ['title' => 'Vista Previa']);
                        // return Html::a('<i class="fas fa-poll-h" style="font-size:20px;"></i>', ['#'], [
                        //     'data-bs-toggle' => 'modal', 
                        //     'data-bs-target' => '#surveyPreview',
                        // ]);
                    }
                ],
                'urlCreator' => function ($action, Survey $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>

<!-- JavaScript puro para ocultar el mensaje después de 5 segundos -->
<script>
    setTimeout(function() {
        var messages = document.querySelectorAll('.flash-message');
        messages.forEach(function(message) {
            message.style.transition = 'opacity 1s';
            message.style.opacity = '0';
            setTimeout(function() {
                message.style.display = 'none';
            }, 1000); // Espera 1 segundo adicional después de que la opacidad llegue a 0 para quitar el mensaje
        });
    }, 5000); // 5000 ms = 5 segundos
</script>