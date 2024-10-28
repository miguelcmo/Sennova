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

function convertUrlsToLinks($text) {
    // Expresión regular para detectar URLs
    $pattern = '/(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+([\/\w\.-]*)*/';
    
    // Convertir URLs encontradas en enlaces HTML
    $textWithLinks = preg_replace($pattern, '<a href="$0" target="_blank">$0</a>', $text);
    
    return $textWithLinks;
}

$userWebsite = convertUrlsToLinks($userProfileInfo->website);
// Ejemplo de uso
//$text = "Visita nuestro sitio en https://example.com o sigue https://twitter.com/example";
//echo convertUrlsToLinks($text);
?>

<div class="container member-index mb-3">
    <div class="row">
        
        <div class="col-3">
            <!-- Profile card  -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <!-- <img class="profile-user-img img-fluid img-circle" src="https://placehold.co/200x200?text=UserImage" alt="User profile picture"> -->
                    </div>
                    <?php 
                        if ($userProfile->first_name != null) { 
                            $fullName = $userProfile->first_name . ' ' . $userProfile->last_name;
                        } else {
                            $fullName = null;
                        }
                    ?>
                    <h3 class="profile-username text-center"><?= $fullName != null ? $fullName : Yii::t('app', 'User fullname') ?></h3>
                    <p class="text-muted text-center"><?= $userProfileInfo->occupation ? $userProfileInfo->occupation : Yii::t('app', 'My occupation') ?></p>
                    <?php if($userProfile->visibility == 1): ?>
                    <p class="text-muted text-center"><?= $userProfile->phone_number ? '<a href="tel:' . $userProfile->phone_number . '">' . $userProfile->phone_number . '</a>' : Yii::t('app', 'My phone number') ?></p>
                    <p class="text-muted text-center"><?= $userProfile->birth_date ? Yii::$app->formatter->asDate($userProfile->birth_date, 'php:d/m/Y') : Yii::t('app', 'My birth date') ?></p>
                    <?php endif; ?>
                    <p><?= Html::a(Yii::t('app', 'Edit personal info'), ['profile/view', 'userId' => Yii::$app->user->id], ['class' => 'btn btn-primary w-100 text-white']) ?></p>
                    
                    <?php if($userProfileInfo->visibility == 1): ?>
                    <div>
                        <p class="fw-medium"><i class="bi bi-person-badge mr-1"></i> <?= Yii::t('app', 'Biography') ?></p>
                        <p class="text-muted"><?= $userProfileInfo->bio ?></p>
                        <hr>
                        <p class="fw-medium"><i class="bi bi-globe mr-1"></i> <?= Yii::t('app', 'Website') ?></p>
                        <p class="text-muted"><?= $userWebsite ?></p>
                        <hr>
                        <p class="fw-medium"><i class="bi bi-link-45deg mr-1"></i> <?= Yii::t('app', 'Social Links') ?></p>
                        <p class="text-muted"><?= $userProfileInfo->social_links ?></p>
                        <hr>
                        <p class="fw-medium"><i class="bi bi-buildings-fill mr-1"></i> <?= Yii::t('app', 'Company') ?></p>
                        <p class="text-muted"><?= $userProfileInfo->company ?></p>
                        <hr>
                        <p class="fw-medium"><i class="bi bi-gear-wide mr-1"></i> <?= Yii::t('app', 'Industry') ?></p>
                        <p class="text-muted"><?= $userProfileInfo->industry ?></p>
                    </div>
                    <?php endif; ?>

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

            <!-- ############### Modulos de Servitización Card - Enrollments section ############### -->
            <div class="card mb-3">
                <div class="card-header">
                    <span class="fw-semibold">Modulos de Servitización</span>
                </div>
                <?php foreach ($enrollments as $enrollment): ?>
                <!-- Task Card  -->
                <div class="card-body">
                    <div class="card">
                        <div class="row g-0">
                            <!-- <div class="col-md-4">
                            <img src="https://placehold.co/600x400/green/white" class="img-fluid rounded-start h-100 w-100" style="object-fit: cover;" alt="...">
                            </div> -->
                            <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"><?= $enrollment->course->title ?></h5>
                                <p class="card-text"><?= $enrollment->course->description ?></p>
                                <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                                <!-- <p><a href="#" class="btn btn-primary btn-block w-100">Ingresar al módulo</a></p> -->
                                <p><?= Html::a(Yii::t('app', 'Access Module'), ['course/view', 'id' => $enrollment->course_id], ['class' => 'btn btn-primary w-100']) ?></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. end of task card  -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
