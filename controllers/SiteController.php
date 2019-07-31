<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\user\LoginForm;

class SiteController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('homepage');
    }

    /**
     * @return string
     */
    public function actionDocs()
    {
        return $this->render('docindex.md');
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) and $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', compact('model'));
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }
}