<?php

/** @var yii\web\View $this */

// Its loaded in the main view course-module/view
// $this->registerJsFile('https://cdn.embedly.com/widgets/platform.js', [
//     'async' => true,     // Indica que el script debe cargarse de forma asíncrona
//     'charset' => 'utf-8' // Configura el charset del archivo
// ]);
?>

<style>
    @import url("https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5-content.css");
</style>

<div class="course-view p-3">
    <div class="ck-content">
        <?php 
            if ($model->content) {
                echo $model->content;
            } else {
                echo '<div class="d-flex justify-content-center">';
                echo Yii::t('app', 'This lesson has no content!');
                echo '</div>';
            }
        ?>
    </div>
</div>

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