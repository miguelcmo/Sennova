<?php

use common\models\EnrollmentMessage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\EnrollmentMessageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\EnrollmentMessage $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member'), 'url' => ['member/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Module'), 'url' => ['course/view', 'id' => $enrollment->course_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container enrollment-message-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'New Message'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#messageCreate']) ?>
    </p>

    <!-- Message Create Modal -->
    <div class="modal fade" id="messageCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="messageCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="messageCreateLabel"><?= Yii::t('app', 'New Message') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'messageCreate') ?>
                <?= $form->field($messageModel, 'message')->textArea(['maxlength' => 4000, 'rows' => 3]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php $form = ActiveForm::end(); ?>
        </div>
    </div>
    </div>

    <div class="card mb-5" style="border-radius: 0;">
        <div class="card-body">
            <?php foreach ($messages as $message): ?>
            <div>
                <div>
                    <p class="m-0">
                        <span class="fw-semibold"><?= isset($message->sender->profile) && $message->sender->profile->full_name != null ? $message->sender->profile->full_name : $message->sender->username ?></span>
                         - <span class="fw-light"><?= Yii::$app->formatter->asDate($message->created_at, 'php:d/m/Y g:i A') ?></span>
                    </p>
                </div>
                <div class="card my-1">
                    <div class="card-body">
                        <p class="card-text"><?= $message->message ?></p>
                    </div>
                </div>
                <br>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
