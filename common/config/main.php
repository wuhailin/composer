<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-19
 * Time: 上午12:19
 */
return [
    'yiiPath'       => ROOT_PATH . '/vendor/yiisoft/yii/framework/yii.php',
    'yiicPath'      => ROOT_PATH . '/vendor/yiisoft/yii/framework/yiic.php',
    'yiitPath'      => ROOT_PATH . '/vendor/yiisoft/yii/framework/yiit.php',
    'yiiDebug'      => true,
    'yiiTraceLevel' => 0,
    'configWeb'     => [
        //...
        'aliases'           => [
            'common'    => COMMON_PATH,
            'vendor'    => ROOT_PATH . '/vendor',
            'bootstrap' => COMMON_PATH . '/extension/bootstrap',
        ],
        'language'          => 'zh_cn',
        'timeZone'          => 'Asia/Shanghai',
        'preload'           => ['log'],
        'defaultController' => 'index',
        'import'            => [
            'common.model.*',
            'common.libs.*',
            'common.component.*',
            'common.component.behavior.*',
            'common.component.widget.*',
            'bootstrap.behaviors.*',
            'bootstrap.helper.*',
            'bootstrap.widgets.*',
        ],
        'components'        => [
            'bootstrap'    => [
                'class' => 'bootstrap.components.Bootstrap'
            ],
            'coreMessages' => [
                'basePath' => COMMON_PATH . D . 'messages',
            ],
            'assetManager' => [
                'basePath' => ROOT_PATH . D . 'home/www/assets',
                'baseUrl'  => 'http://www.test.cn/assets',
            ],
            'db'           => [
                /**
                 * 为简化应用配置的复杂度、以及结合大部分应用的使用场景，
                 * 从库配置（部分配置）如果没有设置则会自动继承主库的配置
                 * 会继承的配置为：username,password,charset,tablePrefix,timeout,emulatePrepare,enableParamLogging
                 */
                'class'              => 'MDbConnection', // 指定使用读写分离Class
                'connectionString'   => 'mysql:host=localhost;dbname=test;', // 主库配置
                'username'           => 'root',
                'password'           => '123456',
                'charset'            => 'utf8',
                'tablePrefix'        => '',
                'enableProfiling'    => true,
                'enableParamLogging' => true,
                'timeout'            => 3, // 增加数据库连接超时时间，默认3s
                'slaves'             => [
                    [
                        'connectionString' => 'mysql:host=localhost;dbname=test;',
                        'username'         => 'root',
                        'password'         => '123456',
                    ],
                ]
            ],
            'errorHandle'  => [
                'errorAction' => 'index/error',
            ],
            'log'          => [
                'class'  => 'CLogRouter',
                'routes' => [
                    [
                        'class'   => 'CFileLogRoute',
                        'logPath' => COMMON_PATH . D . 'log',
                        'logFile' => 'error.log',
                        'levels'  => 'error',
                        'except'  => 'CHttpException.*',
                    ],
                    [
                        'class'   => 'CFileLogRoute',
                        'logPath' => COMMON_PATH . D . 'log',
                        'logFile' => 'warning.log',
                        'levels'  => 'warning',
                        'except'  => 'CHttpException.*',
                    ],
                    [
                        'class'   => 'CFileLogRoute',
                        'logPath' => COMMON_PATH . D . 'log',
                        'logFile' => 'info.log',
                        'levels'  => 'info',
                        'except'  => 'CHttpException.*',
                    ],
                    [
                        'class'              => 'CDbLogRoute',
                        'connectionID'       => 'db',
                        'autoCreateLogTable' => true,
                        'logTableName'       => 'log',
                        'levels'             => 'warning, error, info'
                    ],
                ],
            ],
            'cache'        => [
                'class' => 'system.caching.CDummyCache',
            ],
            'memCache'     => [
                //...
                'class'   => 'system.caching.CMemCache',
                'servers' => [
                    [
                        'host'   => 'localhost',
                        'port'   => 11211,
                        'weight' => 50
                    ],
                ]
            ],
            'redis'        => [
                'class' => 'system.caching.CRedisCache',
            ],
            'urlManager'   => [
                'showScriptName' => false,
                'urlFormat'      => 'path',
                'urlSuffix'      => '.html',
                'rules'          => [
                    '<_m:(gii)>'           => '<_m>/default/index',
                    '<_m:\w+>'             => '<_m>/index/index',
                    '<_c:\w+>/<id:\d+>'    => '<_c>/view',
                    '<_c:\w+>/<_a:\w+\d*>' => '<_c>/<_a>',
                ],
            ],
            'mailer'       => [
                'class'    => 'vendor.janisto.yii-mailer.SwiftMailerComponent',
                'type'     => 'smtp',
                'host'     => 'smtp.qq.com',
                'port'     => 465,
                'username' => '',
                'password' => '',
                'security' => 'ssl',
                'throttle' => 300
            ],
        ],
        'params'            => [
            'adminEmail' => 'admin@qq.com',
        ],
    ],
    'configConsole' => [
        //...
        'aliases'    => 'inherit',
        'preload'    => ['log'],
        'import'     => 'inherit',
        'components' => [
            'db'  => 'inherit',
            'log' => 'inherit',
        ],
    ]
];