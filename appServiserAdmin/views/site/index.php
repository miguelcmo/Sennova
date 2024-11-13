<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Course $model */

use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\Course $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    
    <!-- Verifica si hay algún mensaje flash y muéstralo  -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success flash-message">
            <?= Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('warning')): ?>
        <div class="alert alert-warning flash-message">
            <?= Yii::$app->session->getFlash('warning'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger flash-message">
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>
    <!-- End of flash messages  -->

    <!-- Update Course Modal -->
    <div class="modal fade" id="profilePictureUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profilePictureUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="profilePictureUpdateLabel"><?= Yii::t('app', 'Choose your Avatar') ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="modal-body">
                <?= Html::hiddenInput('form-name', 'profilePictureUpdate') ?>
                <?= $form->field($profileInfoModel, 'profile_picture')->radioList(
                    Yii::$app->params['avatars'],
                    [
                        'item' => function($index, $label, $name, $checked, $value) {
                            return '<label style="display: inline-block; margin: 10px; text-align: center;">' .
                                Html::radio($name, $checked, ['value' => $value]) .
                                Html::img($label, ['style' => 'width: 50px; height: 50px; border-radius: 50%;']) .
                                '</label>';
                        }
                    ])->label(Yii::t('app', 'Profile Avatar')) ?>
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

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Módulos',
                'number' => $courses,
                'icon' => 'fas fa-book',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Temas',
                'number' => $lessons,
                'theme' => 'success',
                'icon' => 'fas fa-comments',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Participantes',
                'number' => $subscribers,
                'theme' => 'gradient-warning',
                'icon' => 'fas fa-users',
            ]) ?>
        </div>
    </div>
</div>

<!-- JavaScript puro para ocultar el mensaje después de 5 segundos -->
<script>
    setTimeout(function() {
        var messages = document.querySelectorAll('.flash-message');
        messages.forEach(function(message) {
            message.style.transition = 'opacity 1s';
            message.style.opacity = '0';
            setTimeout(function() {
                message.style.display = 'none';
            }, 1000); // Espera 1 segundo adicional después de que la opacidad llegue a 0 para quitar el mensaje
        });
    }, 5000); // 5000 ms = 5 segundos
</script>