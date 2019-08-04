<?php

//ini_set('display_errors', true);
define('YII_DEBUG', false);

// Включаем сам фреймворк Yii
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . './../vendor/yiisoft/yii2/Yii.php');

// Получаем конфигурацию
$config = require(__DIR__ . '/../config/web.php');

// Создаем и немедленно выполняем приложение
(new \yii\web\Application($config))->run();
