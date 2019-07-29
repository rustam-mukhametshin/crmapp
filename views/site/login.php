<?php

use app\models\user\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new LoginForm();

$form = ActiveForm::begin(['id' => 'login-form']);
echo $form->field($model, 'username');
echo $form->field($model, 'password')->passwordInput();
echo $form->field($model, 'rememberMe')->checkbox();
echo Html::submitButton(
    'Login',
    ['class' => 'btn btn-primary', 'name' => 'login-button']
);
ActiveForm::end();