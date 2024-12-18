<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Address $model */

$this->title = Yii::t('app', 'Create Address');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
