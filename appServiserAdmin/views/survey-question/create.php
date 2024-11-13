<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SurveyQuestion $model */

$this->title = Yii::t('app', 'Create Survey Question');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey'), 'url' => ['survey/view', 'id' => $surveySectionModel->survey_id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey Section'), 'url' => ['survey-section/view', 'id' => $surveySectionModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-question-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
