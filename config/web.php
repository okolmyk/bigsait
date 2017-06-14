<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'sA--k3ZqMO8bpNQpB1m84M5ML7GHCTTj',
            //
				'parsers' => [
						'application/json' => 'yii\web\JsonParser',
				]
				
			//
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
           // 'enableSession' => false, // 
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [                     
			'class' => 'yii\rbac\PhpManager',
			
        ],
       /* 'response' => [
			'format' => yii\web\Response::FORMAT_JSON,
			'charset' => 'UTF-8',
		],*/
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
				
				//['class' => 'yii\rest\UrlRule', 'controller' => 'user'],

				'admin/category-products/<action:view|update>/<id:\d*>' => 'admin/category-products/<action>',	
				
				'admin/products/<action:view|update|productsone>/<id:\d*>' => 'admin/products/<action>',	
				
				'admin/markets/<action:view|update>/<id:\d*>' => 'admin/markets/<action>',	
				
				//'category-products' => 'admin/category-products',
				
				'admin/users/<action:view|update|create>/<id:\d*>' => 'admin/users/<action>',
				
				'admin/size/<action:view|update|create>/<id:\d*>' => 'admin/size/<action>',
				
				'admin/product-size/<action:view|update|create>/<id:\d*>' => 'admin/product-size/<action>',
				
				'admin/atribut/<action:view|update|create>/<id:\d*>' => 'admin/atribut/<action>',
				
				'admin/value/<action:view|update|create>/<id:\d*>' => 'admin/value/<action>',
				
				//'users' => 'admin/users/',
				
				/*url для api*/
				
				'user/<action:view|update|create|delete>/<id:\d*>' => 'api/user/<action>',	
				
				'product/<action:view|update|delete>/<id:\d*>' => 'api/product/<action>',
				
				'product/create' => 'api/product/create',
				
				'product' => 'api/product',
				
				'user' => 'api/user',
				
	
		
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
