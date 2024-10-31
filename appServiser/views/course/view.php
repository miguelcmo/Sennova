<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

use yii\widgets\ActiveForm;

// /** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */

//$this->title = Yii::t('app', 'Module: {title}', ['title' => $course->title]);
$this->title = $course->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member'), 'url' => ['member/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- ########## Personal Info view ##########  -->
<div class="container course-view mb-5">

    <div class="d-flex justify-content-end">
        <?= Html::a('<span class="d-flex align-items-center"><i class="bi bi-envelope-check-fill" style="font-size: 2em;"></i>&nbsp;' . Yii::t('app', 'Messages') . '</span>', ['enrollment-message/index', 'enrollmentId' => $enrollment->id], ['class' => 'btn btn-warning text-center']) ?>
    </div>
    <!-- Header section course presentation  -->
    <div class="px-4 py-4">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
            <div class="col-lg-6">
            <img src=<?= "https://placehold.co/600x400?text=" . $course->title ?> class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
            <h1 class="display-5 fw-semibold text-body-emphasis lh-1 mb-3"><?= $course->title ?></h1>
            <p class="lead"><?= $course->description ?></p>
            </div>
        </div>
    </div>

    <h3><?= Yii::t('app', 'Lessons list of module {title}', ['title' => $course->title])?></h3>
    <!-- Accordio to show the course sections and lesson  -->
    <div class="accordion" id="sectionAccordion">
        <?php $first = true; ?> 
        <?php foreach ($courseModules as $courseModule): ?>
            <?php if ($first) { ?>
            <!-- Accordion item start  -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target=<?= "#collapse" . $courseModule->id ?> aria-expanded="true" aria-controls=<?= "collapse" . $courseModule->id ?>>
                    <?= $courseModule->title ?>
                </button>
                </h2>
                <!-- <div id="collapseOne" ?> class="accordion-collapse collapse show" data-bs-parent="#sectionAccordion"> -->
                <div id=<?= "collapse" . $courseModule->id ?> class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <ul>
                    <?php foreach ($lessons as $lesson): ?>
                        <?php if($lesson->course_module_id == $courseModule->id) { ?>
                        <li><?= Html::a($lesson->title, ['lesson/view', 'id' => $lesson->id]) ?></li>
                        <?php } ?>
                    <?php endforeach; ?>
                    </ul>
                </div>
                </div>
            </div>
            <!-- Accordion item end  -->
            <?php $first = false; } else { ?>
            <!-- Accordion item start  -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target=<?= "#collapse" . $courseModule->id ?> aria-expanded="false" aria-controls=<?= "collapse" . $courseModule->id ?>>
                    <?= $courseModule->title ?>
                </button>
                </h2>
                <div id=<?= "collapse" . $courseModule->id ?> class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul>
                    <?php foreach ($lessons as $lesson): ?>
                        <?php if($lesson->course_module_id == $courseModule->id) { ?>
                        <li><?= Html::a($lesson->title, ['lesson/view', 'id' => $lesson->id]) ?></li>
                        <?php } ?>
                    <?php endforeach; ?>
                    </ul>
                </div>
                </div>
            </div>
            <!-- Accordion item end  -->
            <?php } ?>
        <?php endforeach; ?>
    </div>

</div>