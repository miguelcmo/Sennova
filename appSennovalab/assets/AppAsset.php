<?php

namespace appSennovalab\assets;

use yii\web\AssetBundle;

/**
 * Main SennovaLab application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/custom.css',
        'css/site.css',
    ];
    public $js = [
        //'bootstrap/js/bootstrap.bundle.min.js', // Ruta al archivo local de Bootstrap JS
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap5\BootstrapAsset',
    ];
}
