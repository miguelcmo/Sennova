<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var pms\models\Profile $model */

/*
$this->title = Yii::t('app', 'Update Profile: {name}', [
    'name' => $model->id,
]);*/
$this->title = Yii::t('app', 'Update About Me Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['view', 'userId' => $model->userId]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profile-update">

    <p><?php // Html::encode($this->title) ?></p>

    <?= $this->render('_form-about-me', [
        'model' => $model,
    ]) ?>

</div>
