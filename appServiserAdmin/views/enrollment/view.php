<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Enrollment $model */

$this->title = Yii::t('app', 'Enrollment Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrollments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="enrollment-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'enrolled_at',
            'dropped_at',
            'status',
            'role',
        ],
    ]) ?>

</div>
