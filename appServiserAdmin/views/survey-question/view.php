<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\SurveyQuestion $model */

use common\models\SurveyOption;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var common\models\SurveyOptionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\widgets\ActiveForm;

/** @var common\models\SurveyQuestion $model */
/** @var yii\widgets\ActiveForm $form */

//use kartik\grid\GridView;
//use kartik\editable\Editable;

$this->title = Yii::t('app', 'Survey Question Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey'), 'url' => ['survey/view', 'id' => $model->survey_id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Section'), 'url' => ['survey-section/view', 'id' => $model->section_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$qType = $model->question_type;
$optionView = $qType == 'multiple_choice' || $qType == 'drop_down_list' ? true : false;
$checkboxView = $qType == 'checkbox' ? true : false;
$tofView = $qType == 'true_false' ? true : false;
?>
<div class="survey-question-view">

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

    <h3><?= Yii::t('app', 'Survey Question Details') ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['#'], ['class' => 'btn btn-primary', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#surveyQuestionUpdate']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!-- Update Survey Question Modal -->
    <div class="modal fade" id="surveyQuestionUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyQuestionUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyQuestionUpdateLabel"><?= Yii::t('app', 'Update Survey Question') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'surveyQuestionUpdate') ?>
                <?= $form->field($model, 'question_text')->textarea(['rows' => 3]) ?>
                <?php // $form->field($model, 'question_type')->dropDownList(Yii::$app->params['question_types_es'], ['prompt' => '']) ?>
                <?= $form->field($model, 'points')->textInput() ?>
                <?= $form->field($model, 'hint')->textarea(['rows' => 3]) ?>
                <?= $form->field($model, 'explanation')->textarea(['rows' => 3]) ?>
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
            'hint:ntext',
            'explanation:ntext',
            //'media_type',
            //'media_url:url',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>

<!-- First section  -->
<?php if ($optionView) : ?>
<!-- ########################## survey question options for multiple choice and drop down list ########################## -->
<div class="survey-option-index">

    <!-- Verifica si hay algún mensaje flash y muéstralo  -->
    <!-- <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success flash-message">
            <?= Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger flash-message">
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?> -->

    <h4><?= Yii::t('app', 'Question Options') ?></h4>
    <p><?= Yii::t('app', 'Add some answer options for this question.') ?></p>

    <p>
        <?= Html::a(Yii::t('app', 'New Option'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#surveyOptionCreate']) ?>
    </p>

    <!-- Create Survey Option Modal -->
    <div class="modal fade" id="surveyOptionCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyOptionCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyOptionCreateLabel"><?= Yii::t('app', 'Create Survey Option') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'surveyOptionCreate') ?>
                <?= $form->field($surveyOptionModel, 'option_text')->textInput(['maxlength' => true]) ?>
                <?php // $form->field($surveyOptionModel, 'is_correct')->textInput() ?>
                <?php // $form->field($surveyOptionModel, 'weight')->textInput() ?>
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

    <!-- Update Survey Option Modal -->
    <div class="modal fade" id="surveyOptionUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyOptionUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyOptionUpdateLabel"><?= Yii::t('app', 'Update Survey Option') ?></h1>
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
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'question_id',
            [
                'attribute' => 'option_text',
                'value' => function ($model) {
                    return Yii::t('app', $model->option_text);
                }
            ],
            //'is_correct',
            [
                'attribute' => 'is_correct',
                'format' => 'raw',
                'value' => function($model) {
                    // Cambiar el icono y el texto en función del valor actual
                    $buttonText = $model->is_correct ? '<i class="fas fa-toggle-on" style="font-size: 24px;"></i>' : '<i class="fas fa-toggle-off" style="font-size: 24px;"></i>';
                    $buttonClass = $model->is_correct ? 'btn-success' : 'btn-danger';
                    $isCorrectString = $model->is_correct ? Yii::t('app', 'Yes') : Yii::t('app', 'No');
                    // Crear el botón
                    return $isCorrectString . "&nbsp;" . Html::a($buttonText, ['update-is-correct', 'id' => $model->id, 'questionId' => $model->question_id], [
                        'class' => '',
                        'data-method' => 'post',
                        'data-pjax' => '0',
                        'data-toggle' => 'tooltip',
                        'title' => 'Cambiar estado',
                        'onclick' => 'changeStatus(event, this); return false;'
                    ]);
                },
            ],
            'weight',
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'header' => Yii::t('app', 'Actions'),
                'contentOptions' => ['style' => 'width: 140px; text-align: center;'], // Aumenta el ancho de la columna
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['#'], [
                            'class' => 'custom-update-button', // Añade clases personalizadas
                            'data-bs-toggle' => 'modal', 
                            'data-bs-target' => '#surveyOptionUpdate',
                            'data-id' => $model->id, // Pasar ID del modelo
                            'title' => 'Actualizar',
                            'aria-label' => 'Actualizar',
                            'data-pjax' => '0', // Evitar que PJAX se active
                        ]);
                    },
                ],
                'urlCreator' => function ($action, SurveyOption $model, $key, $index, $column) {
                    return Url::toRoute(['survey-option/' . $action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'option_text', // Columna de texto de la opción
            
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'is_correct',
                'editableOptions' => [
                    'inputType' => Editable::INPUT_DROPDOWN_LIST,
                    'data' => [1 => 'Yes', 0 => 'No'], // Opciones para `Is Correct`
                    'formOptions' => ['action' => Url::to(['survey-option/updateiscorrect'])], // Acción para actualizar en el controlador
                    'asPopover' => false, 
                ],
                'value' => function ($model) {
                    return $model->is_correct ? 'Yes' : 'No';
                },
                'format' => 'raw',
                'header' => 'Is Correct',
            ],
            
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'weight',
                'editableOptions' => [
                    'inputType' => Editable::INPUT_TEXT,
                    'formOptions' => ['action' => Url::to(['surveyoption/updateweight'])],
                    'asPopover' => false, 
                ],
                'header' => 'Weight',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ], // Columnas de acciones como ver, editar, eliminar
        ],
    ]); */ ?>

</div>
<?php endif; ?>

<!-- Second section  -->
<?php if ($checkboxView) : ?>
<!-- ########################## survey question options for checkbox ########################## -->
<div class="survey-option-index">

    <h4><?= Yii::t('app', 'Question Options') ?></h4>
    <p><?= Yii::t('app', 'Add some answer options for this question.') ?></p>

    <p>
        <?= Html::a(Yii::t('app', 'New Option'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#surveyOptionCreate']) ?>
    </p>

    <!-- Create Survey Option Modal -->
    <div class="modal fade" id="surveyOptionCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyOptionCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyOptionCreateLabel"><?= Yii::t('app', 'Create Survey Option') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'surveyOptionCreate') ?>
                <?= $form->field($surveyOptionModel, 'option_text')->textInput(['maxlength' => true]) ?>
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

    <!-- Update Survey Option Modal -->
    <div class="modal fade" id="surveyOptionUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyOptionUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyOptionUpdateLabel"><?= Yii::t('app', 'Update Survey Option') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="updateContent">
                <!-- Puedes cargar el formulario dinámicamente usando AJAX -->
            </div>
        </div>
    </div>
    </div>

    <!-- Update Survey Option Weight Modal -->
    <div class="modal fade" id="surveyOptionWeightUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyOptionWeightUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyOptionWeightUpdateLabel"><?= Yii::t('app', 'Set Option Weight') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="updateWeightContent">
                <!-- Puedes cargar el formulario dinámicamente usando AJAX -->
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
            [
                'attribute' => 'option_text',
                'value' => function ($model) {
                    return Yii::t('app', $model->option_text);
                }
            ],
            [
                'attribute' => 'is_correct',
                'format' => 'raw',
                'value' => function($model) {
                    // Cambiar el icono y el texto en función del valor actual
                    $buttonText = $model->is_correct ? '<i class="fas fa-toggle-on" style="font-size: 20px;"></i>' : '<i class="fas fa-toggle-off" style="font-size: 20px;"></i>';
                    $buttonClass = $model->is_correct ? 'btn-success' : 'btn-danger';
                    $isCorrectString = $model->is_correct ? Yii::t('app', 'Yes') : Yii::t('app', 'No');
                    // Crear el botón
                    return $isCorrectString . "&nbsp;" . Html::a($buttonText, ['update-many-correct', 'id' => $model->id, 'questionId' => $model->question_id], [
                        'class' => '',
                        'data-method' => 'post',
                        'data-pjax' => '0',
                        'data-toggle' => 'tooltip',
                        'title' => 'Cambiar estado',
                        //'onclick' => 'changeStatus(event, this); return false;'
                    ]);
                },
            ],
            [
                'attribute' => 'weight',
                'format' => 'raw',
                'value' => function($model) {
                    // Cambiar el icono y el texto en función del valor actual
                    $buttonText = '<i class="fas fa-pencil-alt" style="font-size: 16px;"></i>';
                    // Crear el botón
                    return $model->weight . "&nbsp;" . Html::a('<i class="fas fa-pencil-alt"></i>', ['#'], [
                        'class' => 'weight-update-button', // Añade clases personalizadas
                        'data-bs-toggle' => 'modal', 
                        'data-bs-target' => '#surveyOptionWeightUpdate',
                        'data-id' => $model->id, // Pasar ID del modelo
                        'title' => Yii::t('app', 'Set Weight'),
                        'aria-label' => 'Actualizar',
                        'data-pjax' => '0', // Evitar que PJAX se active
                    ]);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'header' => Yii::t('app', 'Actions'),
                'contentOptions' => ['style' => 'width: 140px; text-align: center;'], // Aumenta el ancho de la columna
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['#'], [
                            'class' => 'custom-update-button', // Añade clases personalizadas
                            'data-bs-toggle' => 'modal', 
                            'data-bs-target' => '#surveyOptionUpdate',
                            'data-id' => $model->id, // Pasar ID del modelo
                            'title' => 'Actualizar',
                            'aria-label' => 'Actualizar',
                            'data-pjax' => '0', // Evitar que PJAX se active
                        ]);
                    },
                ],
                'urlCreator' => function ($action, SurveyOption $model, $key, $index, $column) {
                    return Url::toRoute(['survey-option/' . $action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
<?php endif; ?>

<!-- Third section  -->
<?php if ($tofView) : ?>
<!-- ########################## survey question true_false ########################## -->
<div class="survey-option-index">

    <h4><?= Yii::t('app', 'Question Options') ?></h4>
    
    <!-- Update Survey Option Modal -->
    <div class="modal fade" id="surveyOptionUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="surveyOptionUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="surveyOptionUpdateLabel"><?= Yii::t('app', 'Update Survey Option') ?></h1>
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
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'question_id',
            [
                'attribute' => 'option_text',
                'value' => function ($model) {
                    return Yii::t('app', $model->option_text);
                }
            ],
            [
                'attribute' => 'is_correct',
                'format' => 'raw',
                'value' => function($model) {
                    // Cambiar el icono y el texto en función del valor actual
                    $buttonText = $model->is_correct ? '<i class="fas fa-toggle-on" style="font-size: 20px;"></i>' : '<i class="fas fa-toggle-off" style="font-size: 20px;"></i>';
                    $buttonClass = $model->is_correct ? 'btn-success' : 'btn-danger';
                    $isCorrectString = $model->is_correct ? Yii::t('app', 'Yes') : Yii::t('app', 'No');
                    // Crear el botón
                    return $isCorrectString . "&nbsp;" . Html::a($buttonText, ['update-is-correct', 'id' => $model->id, 'questionId' => $model->question_id], [
                        'class' => '',
                        'data-method' => 'post',
                        'data-pjax' => '0',
                        'data-toggle' => 'tooltip',
                        'title' => 'Cambiar estado',
                        'onclick' => 'changeStatus(event, this); return false;'
                    ]);
                },
            ],
            'weight',
            [
                'class' => ActionColumn::className(),
                'template' => '{update}',
                'header' => Yii::t('app', 'Actions'),
                'contentOptions' => ['style' => 'width: 140px; text-align: center;'], // Aumenta el ancho de la columna
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['#'], [
                            'class' => 'custom-update-button', // Añade clases personalizadas
                            'data-bs-toggle' => 'modal', 
                            'data-bs-target' => '#surveyOptionUpdate',
                            'data-id' => $model->id, // Pasar ID del modelo
                            'title' => 'Actualizar',
                            'aria-label' => 'Actualizar',
                            'data-pjax' => '0', // Evitar que PJAX se active
                        ]);
                    },
                ],
                'urlCreator' => function ($action, SurveyOption $model, $key, $index, $column) {
                    return Url::toRoute(['survey-option/' . $action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<?php endif; ?>


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
        url: 'index.php?r=survey-option/findforupdate&id=' + id, // Asegúrate de que esta URL sea correcta
        type: 'GET',
        success: function(data) {
            $('#updateContent').html(data); // Inserta el formulario en el modal
            $('#surveyOptionUpdate').modal('show'); // Muestra el modal
        },
        error: function() {
            alert('Error al cargar el formulario de actualización.');
        }
    });
});
JS;
$this->registerJs($script);
?>

<!-- AJAX call to get the model data for the update proccess  -->
<?php
$script = <<< JS
$(document).on('click', '.weight-update-button', function() {
    var id = $(this).data('id');
    
    // Cargar el contenido del formulario en el modal usando AJAX
    $.ajax({
        url: 'index.php?r=survey-option/set-option-weight&id=' + id, // Asegúrate de que esta URL sea correcta
        type: 'GET',
        success: function(data) {
            $('#updateWeightContent').html(data); // Inserta el formulario en el modal
            $('#surveyOptionWeightUpdate').modal('show'); // Muestra el modal
        },
        error: function() {
            alert('Error al cargar el formulario de actualización.');
        }
    });
});
JS;
$this->registerJs($script);
?>

<!-- Call the actionUpdateIsCorrect to set the new values -->
<script>
function changeStatus(event, element) {
    event.preventDefault();
    
    const url = $(element).attr('href');
    $.post(url, function(data) {
        if (data.success) {
            // Cambiar el texto y la clase del botón basado en el nuevo estado
            if (data.is_correct) {
                $(element).text('Correcto').removeClass('btn-danger').addClass('btn-success');
            } else {
                $(element).text('Incorrecto').removeClass('btn-success').addClass('btn-danger');
            }
        } else {
            alert('Error al cambiar el estado');
        }
    });
}
</script>