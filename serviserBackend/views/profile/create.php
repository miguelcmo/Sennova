<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var pms\models\Profile $model */

$this->title = Yii::t('app', 'Create Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">

<br>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
