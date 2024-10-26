<?php

use common\models\AuthAssignment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\AuthAssignmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Auth Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Create Auth Assignment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'Username'),
                'value' => function ($model) {
                    return $model->user ? $model->user->username : 'Sin usuario';
                }
            ],
            [
                'attribute' => 'item_name',
                'label' => Yii::t('app', 'Role Name'),
            ],
            'created_at:datetime',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => function ($action, AuthAssignment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
