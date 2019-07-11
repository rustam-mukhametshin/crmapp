<?php


namespace app\assets;

use yii\web\AssetBundle;

class ApplicationUiAssetBundle extends AssetBundle
{
    public $sourcePath = '@app/assets/ui';
    public $css = [
        'css/main.css',
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\web\YiiAsset',
    ];
}