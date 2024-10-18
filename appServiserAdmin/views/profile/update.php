<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var pms\models\Profile $model */

/*
$this->title = Yii::t('app', 'Update Profile: {name}', [
    'name' => $model->id,
]);*/
$this->title = Yii::t('app', 'Update Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['user/index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profile-update">

    <p><?php // Html::encode($this->title) ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
