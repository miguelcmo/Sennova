<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProfileInfo $model */

$this->title = Yii::t('app', 'Create Profile Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
