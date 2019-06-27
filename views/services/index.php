<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\service\ServiceSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Service Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'hourly_rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
