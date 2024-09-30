<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
?>

<!-- Footer Section -->
<footer class="main-footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mb-3 navbar-light d-flex justify-content-center">
                <img src="images/logos/logos-footer.png" alt="Logos SENA, Sennova y LabServiser" width="400px">
            </div>
            <div class="col-12 col-md-2 mb-3 navbar-light">
                <h5><b>Sobre Nosotros</b></h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><?= Html::a('Inicio', ['site/index'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Más proyectos', ['site/project'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Nuestro Equipo', ['site/about'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Contacto', ['site/contact'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Producción científica', ['site/scientific'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                </ul>
            </div>
            <div class="col-12 col-md-2 mb-3">
                <h5><b>Servicios</b></h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><?= Html::a('Servitización', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Consultoría', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Capacitación', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Preguntas frecuentes', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Soporte', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                </ul>
            </div>
            <div class="col-12 col-md-2 mb-3">
                <h5><b>Recursos</b></h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><?= Html::a('Blog', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Casos de éxito', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                    <li class="nav-item mb-2"><?= Html::a('Webinars', ['#'], ['class' => 'nav-link p-0 text-body-secondary']); ?></li>
                </ul>
            </div>
            <div class="col-12 col-md-2 mb-3 navbar-light d-flex felx-column justify-content-center">
                <ul class="list-unstyled">
                    <!-- Boton para registro solo se muestra si el usuario es guest -->
                    <li class="nav-item">
                        <?php if (Yii::$app->user->isGuest) {
                            echo Html::a('Registrarse', ['site/signup'], ['class' => 'btn btn-dark my-2 w-100']);
                        } ?>   
                    </li>
                    <!-- Boton Menu de usuario solo se muestra si el usuario esta logueado -->
                    <li class="nav-item">
                        <?php if (!Yii::$app->user->isGuest) {
                            echo Html::a('Menu usuario', ['#'], ['class' => 'btn btn-secondary my-2 w-100']);
                        } ?>
                    </li>    
                    <!-- Boton Iniciar sesion / Cerrar sesion cambia de acuerdo al si el usuario esta logueado o no -->
                    <li class="nav-item">
                        <?php 
                            if (Yii::$app->user->isGuest) {
                                echo Html::tag('div',Html::a('Iniciar Sesión',['/site/login'],['class' => ['btn btn-outline-dark']]));
                            } else {
                                echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                                    . Html::submitButton(
                                        'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-warning w-100']
                                    )
                                    . Html::endForm();
                            }
                        ?>
                    </li>
                    
                </ul>
            </div>
        </div>

        <div class="row border-top border-2 border-secondary justify-content-between">
            <div class="col" style="margin-top: 10px;">
                <span class="align-middle">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></span>
            </div>
            <div class="col d-flex justify-content-end" style="margin-top: 10px;">
                    <span><a href="https://www.instagram.com/senacomunica/" class="link-secondary"><i class="bi bi-instagram mx-1" style="font-size: 1.5rem;"></i></a></span>
                    <span><a href="https://www.facebook.com/SENA/" class="link-secondary"><i class="bi bi-facebook mx-1"  style="font-size: 1.5rem;"></i></a></span>
                    <span><a href="https://twitter.com/SENAComunica" class="link-secondary"><i class="bi bi-twitter mx-1" style="font-size: 1.5rem;"></i></a></span>
                    <span><a href="https://www.youtube.com/user/SENATV" class="link-secondary"><i class="bi bi-youtube mx-1" style="font-size: 1.5rem;"></i></a></span>
                    <span><a href="https://www.linkedin.com/school/servicio-nacional-de-aprendizaje-sena-/" class="link-secondary"><i class="bi bi-linkedin mx-1" style="font-size: 1.5rem;"></i></a></span>
                    <span class="mx-1"></span>
                    <span style="letter-spacing: 3px;"><a href="https://www.sena.edu.co" class="link-secondary align-middle text-decoration-none"><strong>www.sena.edu.co</strong></a></span> 
            </div>
        </div>
    </div>
</footer>