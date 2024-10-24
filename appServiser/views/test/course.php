<?php

/** @var yii\web\View $this */

$this->registerJsFile('https://cdn.embedly.com/widgets/platform.js', [
    'async' => true,     // Indica que el script debe cargarse de forma asíncrona
    'charset' => 'utf-8' // Configura el charset del archivo
]);
?>

<style>
    @import url("https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5-content.css");
</style>

<div class="course-view container py-5">
    <h1>Test lesson content rendering</h1>

    <p>
        You may change the content of this page by modifying
        the file <code><?= __FILE__; ?></code>.
    </p>

    <div class="ck-content">
        <?= $model->content ?>
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
