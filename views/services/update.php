<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\service\ServiceRecord */

$this->title = 'Update Service Record: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Service Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
