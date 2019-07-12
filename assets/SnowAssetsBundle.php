<?php


namespace app\assets;


use yii\web\AssetBundle;

class SnowAssetsBundle extends AssetBundle
{
    public $sourcePath = '@app/assets/snow';
    public $css = [
        'snow.css',
    ];
    public $depends = [
        'app\\assets\\ApplicationUiAssetBundle',
    ];
}