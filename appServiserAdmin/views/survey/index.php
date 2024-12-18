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

    <!-- Button trigger modal -->
    <p>
        <?= Html::a(Yii::t('app', 'Create Survey'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#surveyCreate']) ?>
    </p>

    <!-- Survey Create Modal -->
    <div class="modal fade" id="surveyCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
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

    <!-- Survey Update Modal -->
    <div class="modal fade" id="surveyUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyUpdateLabel"><?= Yii::t('app', 'Update Survey') ?></h1>
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
                'template' => '{view} {update} {delete}',
                'header' => Yii::t('app', 'Actions'),
                'contentOptions' => ['style' => 'width: 100px; text-align: center;'], // Aumenta el ancho de la columna
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', '#', [
                            'class' => 'custom-update-button', // Añade clases personalizadas
                            'data-bs-toggle' => 'modal', 
                            'data-bs-target' => '#surveyUpdate',
                            'data-id' => $model->id, // Pasar ID del modelo
                            'title' => 'Actualizar',
                            'aria-label' => 'Actualizar',
                            'data-pjax' => '0', // Evitar que PJAX se active
                        ]);
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

<!-- AJAX call to get the model data for the update proccess  -->
<?php
$script = <<< JS
$(document).on('click', '.custom-update-button', function() {
    var id = $(this).data('id');
    
    // Cargar el contenido del formulario en el modal usando AJAX
    $.ajax({
        url: 'index.php?r=survey/findforupdate&id=' + id, // Asegúrate de que esta URL sea correcta
        type: 'GET',
        success: function(data) {
            $('#updateContent').html(data); // Inserta el formulario en el modal
            $('#surveyUpdate').modal('show'); // Muestra el modal
        },
        error: function() {
            alert('Error al cargar el formulario de actualización.');
        }
    });
});
JS;
$this->registerJs($script);
?>