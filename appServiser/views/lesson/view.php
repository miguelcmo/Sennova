<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = Yii::t('app', 'Lesson: {title}', ['title' => $lesson->title]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member'), 'url' => ['member/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Module'), 'url' => ['course/view', 'id' => $lesson->course_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->registerJsFile('https://cdn.embedly.com/widgets/platform.js', [
    'async' => true,     // Indica que el script debe cargarse de forma asíncrona
    'charset' => 'utf-8' // Configura el charset del archivo
]);
?>

<style>
    @import url("https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5-content.css");
</style>

<!-- ########## Lesson View ##########  -->
<div class="container lesson-view mb-5">

    <div class="ck-content">
        <?= $lesson->content ?>
    </div>
    
</div>

<!-- Oembed script  -->
<script>
    document.querySelectorAll( 'oembed[url]' ).forEach( element => {
        // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
        // to discover the media.
        const anchor = document.createElement( 'a' );

        anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
        anchor.className = 'embedly-card';

        element.appendChild( anchor );
    } );
</script>
