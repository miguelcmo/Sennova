<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SurveyOption $model */

$this->title = Yii::t('app', 'Create Survey Option');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Survey Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
