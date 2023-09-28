<?php

return [
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'api',
    ],

    'api/<controller:\w+>/<action:\w+>' => 'api/<controller>/<action>',
];