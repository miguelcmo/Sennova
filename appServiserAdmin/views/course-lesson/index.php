<?php

use common\models\CourseLesson;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\LessonSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Lessons');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Create Lesson'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

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
            [
                'attribute' => 'course_id',
                'label' => Yii::t('app', 'Module Name'),
                'value' => function ($model) {
                    return $model->course ? $model->course->title : 'There is no title for this Course!'; 
                }
            ],
            //'course_module_id',
            [
                'attribute' => 'title',
                'label' => Yii::t('app', 'Lesson Title'),
            ],
            //'content:html',
            //'video_url:url',
            //'attachment',
            //'order',
            //'created_by',
            //'updated_by',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
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
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

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
