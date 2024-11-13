<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */

$this->title = Yii::t('app', 'Create Lesson');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course'), 'url' => ['course/view', 'id' => $courseModule->course_id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Module'), 'url' => ['course-module/view', 'id' => $courseModule->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
