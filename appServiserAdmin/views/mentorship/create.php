<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Mentorship $model */

$this->title = Yii::t('app', 'Create Mentorship');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mentorships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentorship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
