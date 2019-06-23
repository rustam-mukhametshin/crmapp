<?php

use yii\data\ArrayDataProvider;

/** @var ArrayDataProvider $records */

echo \yii\widgets\ListView::widget([
    'options' => [
        'class' => 'list-view',
        'id' => 'search_results',
    ],
    'itemView' => '_customer',
    'dataProvider' => $records,
]);