<?php
use yii\helpers\Html;
?>

<div class="container">
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
</div>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Accede para comenzar tu experiencia.</p>

        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'email', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Correo Electrónico')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <!-- <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]) ?>
            </div> -->
            <div class="col">
                <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php \yii\bootstrap4\ActiveForm::end(); ?>

        <!-- Just to edit later  -->
        <!-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div> -->
        <!-- /.social-auth-links -->

        <!-- Just to edit later  -->
        <!-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p> -->
    </div>
    <!-- /.login-card-body -->
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