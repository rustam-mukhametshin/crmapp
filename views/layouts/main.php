<?php

use yii\helpers\Html;
use app\assets\ApplicationUiAssetBundle;

/** @var $this \yii\web\View */
/** @var $content */

ApplicationUiAssetBundle::register($this);

?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?= Html::csrfMetaTags() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="container">
        <?= $content ?>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>