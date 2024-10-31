<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\EnrollmentMessage $model */

$this->title = Yii::t('app', 'Create Enrollment Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrollment Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enrollment-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
