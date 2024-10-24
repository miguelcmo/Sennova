<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Hola <?= $user->username ?>,

Sigue el enlace a continuación para verificar tu correo electrónico:

<?= $verifyLink ?>
