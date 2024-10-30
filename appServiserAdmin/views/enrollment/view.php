<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Enrollment $model */

use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\Course $model */
/** @var yii\widgets\ActiveForm $form */

use common\models\Mentorship;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\MentorshipSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Enrollment Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrollments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="enrollment-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <!-- <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'User Name'),
                'value' => function ($model) {
                    return $model->user->email;
                }
            ],
            [
                'attribute' => 'course_id',
                'label' => Yii::t('app', 'Module Name'),
                'value' => function ($model) {
                    return $model->course->title;
                }
            ],
            'enrolled_at',
            'dropped_at',
            'status',
            'role',
        ],
    ]) ?>

</div>

<div class="mentorship-index">

    <h4><?= Yii::t('app', 'Mentors') ?></h4>

    <p>
        <?= Html::a(Yii::t('app', 'Create Mentorship'), ['#'], ['class' => 'btn btn-success', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#mentorshipCreate']) ?>
    </p>

    <!-- Mentorship Create Modal -->
    <div class="modal fade" id="mentorshipCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="MentorshipCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="mentorshipCreateLabel"><?= Yii::t('app', 'Create Mentorship') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'mentorshipCreate') ?>
                <?= $form->field($mentorshipModel, 'user_id')->dropDownList($usersList, ['prompt' => '', 'id' => 'autofocusField'])->label(Yii::t('app', 'User Name')) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php $form = ActiveForm::end(); ?>
        </div>
    </div>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'Username'),
                'value' => function ($model) {
                    return isset($model->profile) && $model->profile->full_name != null ? $model->profile->full_name : $model->user->username;
                }
            ],
            'created_at:datetime',
            [
                //'attribute' => 'user_id',
                'label' => Yii::t('app', 'Role'),
                'value' => function ($model) {
                    $userId = $model->user_id;
                    $roles = Yii::$app->authManager->getRolesByUser($userId);
                    return !empty($roles) ? reset($roles)->name : Yii::t('app', 'No role');
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{delete}',
                'urlCreator' => function ($action, Mentorship $model, $key, $index, $column) {
                    return Url::toRoute(['mentorship/' . $action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<script>
    document.getElementById('mentorshipCreate').addEventListener('shown.bs.modal', function () {
        document.getElementById('autofocusField').focus();
    });
</script>