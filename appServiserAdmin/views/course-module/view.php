<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CourseModule $model */

use common\models\CourseLesson;
//use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
///** @var yii\web\View $this */
/** @var common\models\CourseLessonSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerJsFile('https://cdn.embedly.com/widgets/platform.js', [
    'async' => true,     // Indica que el script debe cargarse de forma asíncrona
    'charset' => 'utf-8' // Configura el charset del archivo
]);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course'), 'url' => ['course/view', 'id' => $model->course_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-module-view">

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
    <h3><?php echo Yii::t('app', 'Course Module Details: '); echo Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['#'], ['class' => 'btn btn-primary', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#courseModuleUpdate']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!-- Update Course Module Modal -->
    <div class="modal fade" id="courseModuleUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="courseModuleUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="courseModuleUpdateLabel"><?= Yii::t('app', 'Update Course Module') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'courseModuleUpdate') ?>
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
                'attribute' => 'course_id',
                'label' => Yii::t('app', 'Module Name'),
                'value' => function ($model) {
                    return $model->course->title;
                }
            ],
            [
                'attribute' => 'title',
                'label' => Yii::t('app', 'Course Module Name'),
            ],
            'description:ntext',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>

<div class="lesson-index">

    <h4><?= Yii::t('app', 'Lessons') ?></h4>

    <p>
        <?= Html::a(Yii::t('app', 'New Lesson'), ['course-lesson/create', 'courseModuleId' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Lesson View Modal -->
    <div class="modal fade" id="lessonView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lessonViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="lessonViewLabel"><?= Yii::t('app', 'Lesson Preview') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="updateContent">
                <!-- Dynamic update of content using AJAX call -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
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
            //'course_module_id',
            'title',
            //'content:ntext',
            //'video_url:url',
            'attachment',
            'order',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i>', '#', [
                            'class' => 'custom-view-button', // Custom class to make the AJAX call
                            'data-bs-toggle' => 'modal', 
                            'data-bs-target' => '#lessonView',
                            'data-id' => $model->id, // Model ID
                            'title' => 'Ver',
                            'aria-label' => 'Ver',
                            'data-pjax' => '0', // Ovoid execute PJAX
                        ]);
                    }
                ],
                'urlCreator' => function ($action, CourseLesson $model, $key, $index, $column) {
                    return Url::toRoute(['course-lesson/'.$action, 'id' => $model->id]);
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
$(document).on('click', '.custom-view-button', function() {
    var id = $(this).data('id');
    
    // Cargar el contenido del formulario en el modal usando AJAX
    $.ajax({
        url: 'index.php?r=course-lesson/preview&id=' + id, // Asegúrate de que esta URL sea correcta
        type: 'GET',
        success: function(data) {
            $('#updateContent').html(data); // Inserta el formulario en el modal
            $('#courseUpdate').modal('show'); // Muestra el modal
        },
        error: function() {
            alert('Error al cargar la vista de la lección.');
        }
    });
});
JS;
$this->registerJs($script);
?>