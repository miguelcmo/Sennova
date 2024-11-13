<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */

$this->title = Yii::t('app', 'Update Lesson: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course'), 'url' => ['course/view', 'id' => $model->course_id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Module'), 'url' => ['course-module/view', 'id' => $model->course_module_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update Lesson');
?>
<div class="lesson-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
