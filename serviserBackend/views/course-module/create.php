<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CourseModule $model */

$this->title = Yii::t('app', 'Create Course Module');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-module-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
