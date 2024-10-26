<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container py-5" style="min-height: 550px;">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        El error anterior ocurrió mientras el servidor web procesaba tu solicitud.
    </p>
    <p>
        Por favor, contáctanos si crees que esto es un error del servidor. Gracias.
    </p>

</div>
