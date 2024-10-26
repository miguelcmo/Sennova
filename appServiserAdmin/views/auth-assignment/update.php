<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AuthAssignment $model */

$this->title = Yii::t('app', 'Update Auth Assignment: {name}', [
    'name' => $model->item_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auth-assignment-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'roleOptions' => $roleOptions,
    ]) ?>

</div>
