<?php

use common\models\Mentorship;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\MentorshipSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'My Mentorships');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentorship-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Create Mentorship'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'enrollment_id',
            //'user_id',
            //'created_by',
            //'updated_by',
            
            //'updated_at',
            [
                'attribute' => 'user_username',
                'label' => Yii::t('app', 'Subscriber Name'),
                'value' => function ($model) {
                    return isset($model->enrollment->user->profile) && $model->enrollment->user->profile->full_name != null ? $model->enrollment->user->profile->full_name : $model->enrollment->user->username;
                },
            ],
            [
                'attribute' => 'user_email',
                'label' => Yii::t('app', 'Subscriber Email'),
                'value' => function ($model) {
                    return $model->enrollment->user->email;
                },
            ],
            [
                'attribute' => 'course_title',
                'label' => Yii::t('app', 'Module Name'),
                'value' => function ($model) {
                    return $model->enrollment->course->title;
                },
            ],
            'created_at:datetime',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Mentorship $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
