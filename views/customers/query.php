<?php

use yii\helpers\Html;

echo Html::beginForm(['/customers'], 'get');
echo Html::label('Phone number to search: ', 'number');
echo Html::textInput('number');
echo Html::submitButton('Search');
echo Html::endForm();