<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\AuthAssignment $model */

$this->title = $model->item_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="auth-assignment-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
