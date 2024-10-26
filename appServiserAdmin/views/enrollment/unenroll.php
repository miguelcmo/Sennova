<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AuthAssignment $model */

$this->title = Yii::t('app', 'Module Unenroll');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrollments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Unenroll');
?>
<div class="enroll-form">

    <!-- Verifica si hay algún mensaje flash y muéstralo  -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success flash-message">
            <?= Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger flash-message">
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

    <?php /*
    <?php if (Yii::$app->session->hasFlash('confirmDelete')): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var confirmDelete = confirm("<?= Yii::$app->session->getFlash('confirmDelete')['message'] ?>");
                if (confirmDelete) {
                    // Enviar la solicitud para eliminar el registro si se confirma
                    $.ajax({
                        url: '<?= \yii\helpers\Url::to(['enrollment/delete', 'id' => Yii::$app->session->getFlash('confirmDelete')['modelId']]) ?>',
                        type: 'POST',
                        success: function(response) {
                            location.reload(); // Recargar la página después de eliminar
                        },
                        error: function() {
                            alert('Error al eliminar el registro.');
                        }
                    });
                }
            });
        </script>
    <?php endif; ?>
    */ ?>

    <h3><?= Html::encode($this->title) ?></h3>

    <p><?= Yii::t('app', 'Unenroll a user from a module') ?><p>
    <p class="text-danger"><?= Yii::t('app', 'Noted: when you remove a user from a module, the operation cannot be reversed, so be careful before do this.') ?></p>

    <?= $this->render('_form-unenroll', [
        'model' => $model,
        'usersList' => $usersList,
        'coursesList' => $coursesList,
    ]) ?>

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
