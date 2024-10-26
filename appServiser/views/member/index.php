<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\FeedbackSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Member');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container member-index mb-3">
    <div class="row">
        
        <div class="col-3">
            <!-- Profile card  -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="https://placehold.co/200x200?text=UserImage" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">Nombre Apellido</h3>
                    <p class="text-muted text-center">Software Engineer</p>
                    <p><?= Html::a(Yii::t('app', 'Edit personal info'), ['profile/view', 'userId' => Yii::$app->user->id], ['class' => 'btn btn-primary w-100 text-white']) ?></p>
                    <strong><i class="bi bi-bookmarks-fill mr-1"></i> Education</strong>
                    <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                    <hr>
                    <strong><i class="bi bi-geo-alt-fill mr-1"></i> Location</strong>
                    <p class="text-muted">Malibu, California</p>
                    <hr>
                    <strong><i class="bi bi-pencil-fill mr-1"></i> Skills</strong>
                    <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                    </p>
                    <hr>
                    <strong><i class="bi bi-file-text-fill mr-1"></i> Notes</strong>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-9">
            <!-- Task List Card  -->
            <div class="card mb-3">
                <div class="card-header">
                <span class="fw-semibold">Lista de Tareas</span>
                </div>
                <!-- Task Card  -->
                <div class="card-body">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="https://placehold.co/600x400/orange/white" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Registrar Unidad Productiva</h5>
                                <p class="card-text">Completa el registro de tu unidad productiva. Los datos que proporciones son esenciales para mejorar nuestro servicio y adaptarlo a tus necesidades.</p>
                                <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                                <p><a href="#" class="btn btn-primary btn-block w-100">Registrar</a></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. end of task card  -->

                <!-- Task Card  -->
                <div class="card-body">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="https://placehold.co/600x400/orange/white" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Realizar Diagnostico Empresarial</h5>
                                <p class="card-text">Completa el diagnóstico empresarial para determinar la ruta de atención más efectiva en nuestros módulos de servitización. Tu participación es clave para ofrecerte soluciones personalizadas y eficientes.</p>
                                <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                                <p><a href="#" class="btn btn-primary btn-block w-100">Diagnostico</a></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. end of task card  -->
            </div>

            <!-- Modulos de Servitización Card  -->
            <div class="card mb-3">
                <div class="card-header">
                    <span class="fw-semibold">Modulos de Servitización</span>
                </div>
                <!-- Task Card  -->
                <div class="card-body">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="https://placehold.co/600x400/green/white" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Mercadeo</h5>
                                <p class="card-text">Completa el registro de tu unidad productiva. Los datos que proporciones son esenciales para mejorar nuestro servicio y adaptarlo a tus necesidades.</p>
                                <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                                <p><a href="#" class="btn btn-primary btn-block w-100">Ingresar al módulo</a></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. end of task card  -->

                <!-- Task Card  -->
                <div class="card-body">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="https://placehold.co/600x400/green/white" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Logistica</h5>
                                <p class="card-text">Completa el diagnóstico empresarial para determinar la ruta de atención más efectiva en nuestros módulos de servitización. Tu participación es clave para ofrecerte soluciones personalizadas y eficientes.</p>
                                <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                                <p><a href="#" class="btn btn-primary btn-block w-100">Ingresar al módulo</a></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. end of task card  -->
            </div>
        </div>
    </div>
</div>
