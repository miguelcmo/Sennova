<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SurveySection $model */

$this->title = Yii::t('app', 'Create Survey Section');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
