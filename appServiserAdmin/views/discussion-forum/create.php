<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DiscussionForum $model */

$this->title = Yii::t('app', 'Create Discussion Forum');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Discussion Forums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discussion-forum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
