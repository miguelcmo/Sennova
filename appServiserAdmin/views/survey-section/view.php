<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SurveySection $model */

use common\models\SurveyQuestion;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\SurveyQuestionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey'), 'url' => ['survey/view', 'id' => $model->survey_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="survey-section-view">

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

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <h3><?php echo Yii::t('app', 'Survey Section Details: '); echo Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['#'], ['class' => 'btn btn-primary', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#surveySectionUpdate']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!-- Update Survey Section Modal -->
    <div class="modal fade" id="surveySectionUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveySectionUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveySectionUpdateLabel"><?= Yii::t('app', 'Update Survey Section') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'surveySectionUpdate') ?>
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
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
            //'id',
            [
                'attribute' => 'survey_id',
                'label' => Yii::t('app', 'Survey Name'),
                'value' => function ($model) {
                    return $model->survey->title;
                }
            ],
            'title',
            'description:ntext',
            'order',
            //'created_by',
            //'updated_by',
            'created_at:datetime',
            //'updated_at:datetime',
        ],
    ]) ?>

</div>

<div class="survey-question-index">

    <h4><?= Yii::t('app', 'Questions') ?></h4>

    <p>
        <?= Html::a(Yii::t('app', 'New Question'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#surveyQuestionCreate']) ?>
    </p>

    <!-- Create Survey Question Modal -->
    <div class="modal fade" id="surveyQuestionCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyQuestionCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyQuestionCreateLabel"><?= Yii::t('app', 'Create Survey Question') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'surveyQuestionCreate') ?>
                <?= $form->field($surveyQuestionModel, 'question_text')->textarea(['rows' => 2]) ?>
                <?= $form->field($surveyQuestionModel, 'question_type')->dropDownList(Yii::$app->params['question_types_es'], ['prompt' => '']) ?>
                <?= $form->field($surveyQuestionModel, 'points')->textInput(['value' => 1]) ?>
                <?= $form->field($surveyQuestionModel, 'hint')->textarea(['rows' => 3]) ?>
                <?= $form->field($surveyQuestionModel, 'explanation')->textarea(['rows' => 3]) ?>
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

    <!-- Update Survey Question Modal -->
    <div class="modal fade" id="surveyQuestionUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyQuestionUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyQuestionUpdateLabel"><?= Yii::t('app', 'Update Survey Question') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="updateContent">
                <!-- Puedes cargar el formulario dinámicamente usando AJAX -->
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
            //'section_id',
            'question_text:ntext',
            [
                'attribute' => 'question_type',
                'value' => function ($model) {
                    return $model->questionTypeLabel;
                }
            ],
            'points',
            //'hint:ntext',
            //'explanation:ntext',
            //'media_type',
            //'media_url:url',
            //'created_by',
            //'updated_by',
            'created_at:datetime',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} ',
                'header' => Yii::t('app', 'Actions'),
                'contentOptions' => ['style' => 'width: 140px; text-align: center;'], // Aumenta el ancho de la columna
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['#'], [
                            'class' => 'custom-update-button', // Añade clases personalizadas
                            'data-bs-toggle' => 'modal', 
                            'data-bs-target' => '#surveyQuestionUpdate',
                            'data-id' => $model->id, // Pasar ID del modelo
                            'title' => 'Actualizar',
                            'aria-label' => 'Actualizar',
                            'data-pjax' => '0', // Evitar que PJAX se active
                        ]);
                    },
                ],
                'urlCreator' => function ($action, SurveyQuestion $model, $key, $index, $column) {
                    return Url::toRoute(['survey-question/' . $action, 'id' => $model->id]);
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

<!-- AJAX call to get the model data for the update proccess  -->
<?php
$script = <<< JS
$(document).on('click', '.custom-update-button', function() {
    var id = $(this).data('id');
    
    // Cargar el contenido del formulario en el modal usando AJAX
    $.ajax({
        url: 'index.php?r=survey-question/findforupdate&id=' + id, // Asegúrate de que esta URL sea correcta
        type: 'GET',
        success: function(data) {
            $('#updateContent').html(data); // Inserta el formulario en el modal
            $('#surveyQuestionUpdate').modal('show'); // Muestra el modal
        },
        error: function() {
            alert('Error al cargar el formulario de actualización.');
        }
    });
});
JS;
$this->registerJs($script);
?>