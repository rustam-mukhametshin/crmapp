<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'Our CRM';
    }

    /**
     * @return string
     */
    public function actionDocs()
    {
        return $this->render('docindex.md');
    }
}