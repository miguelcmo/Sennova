<?php

use common\models\Enrollment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\EnrollmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Enrollments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enrollment-index">

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

    <p>
        <?= Html::a(Yii::t('app', 'Enroll'), ['enroll'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Unenroll'), ['unenroll'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'User Name'),
                'value' => function ($model) {
                    return $model->user->email;
                }
            ],
            [
                'attribute' => 'course_id',
                'label' => Yii::t('app', 'Module Name'),
                'value' => function ($model) {
                    return $model->course->title;
                }
            ],
            'enrolled_at:datetime',
            'dropped_at:datetime',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->getStatusLabel();
                },
            ],
            [
                'attribute' => 'mentors',
                'label' => Yii::t('app', 'Mentors'),
                'value' => function ($model) {
                    $mentorships = $model->mentorships;

                    if (empty($mentorships)) {
                        return Html::tag('i', "This enrollment has no mentors yet!", ['style' => 'font-style: italic; color: gray; font-size: 0.9em;']);
                    }

                    $mentorNames = array_map(function($mentorship) {
                        return isset($mentorship->user->profile) && $mentorship->user->profile->full_name != null ? $mentorship->user->profile->full_name : $mentorship->user->username;
                    }, $mentorships);

                    return implode(', ', $mentorNames);
                },
                'format' => 'html',
            ],
            //'role',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Enrollment $model, $key, $index, $column) {
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