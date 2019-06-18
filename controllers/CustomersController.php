<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * Class CustomersController
 * @package app\controllers
 */
class CustomersController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $records = $this->findRecordsByQuery();
        return $this->render('index', compact('records'));
    }
}