<?php

use common\models\ActivityLog;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\ActivityLogSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Activity Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-log-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <!-- <?= Html::a(Yii::t('app', 'Create Activity Log'), ['create'], ['class' => 'btn btn-success']) ?> -->
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
                'value' => function ($model) {
                    return $model->user->email;
                }
            ],
            'app',
            'activity_type',
            'description:ntext',
            //'created_at',
            'ip_address',
            'device',
            //'browser',
            'location',
            //'additional_data',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, ActivityLog $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
