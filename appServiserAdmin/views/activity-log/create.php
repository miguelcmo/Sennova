<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ActivityLog $model */

$this->title = Yii::t('app', 'Create Activity Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Activity Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
