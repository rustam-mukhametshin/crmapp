<?php
return [
    'id' => 'crmapp',
    'basePath' => realpath(__DIR__ . '/../'),
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'request' => [
            'cookieValidationKey' => 'cookie secret key',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ]
    ]
];