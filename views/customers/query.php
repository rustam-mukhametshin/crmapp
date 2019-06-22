<?php

use yii\helpers\Html;

echo Html::beginForm(['/customers'], 'get');
echo Html::label('Phone number to search: ', 'phone_number');
echo Html::textInput('PhoneRecord[number]');
echo Html::submitButton('Search');
echo Html::endForm();