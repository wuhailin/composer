<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-20
 * Time: 上午12:08
 */
require __DIR__ . '/../../common/component/MyEnvironment.php';
require __DIR__ . '/../../vendor/autoload.php';
$dir = __DIR__ . '/..';
$evn = new \common\component\MyEnvironment($dir);
defined('YII_DEBUG') or define('YII_DEBUG', $evn->yiiDebug);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $evn->yiiTraceLevel);

require_once $evn->yiiPath;
Yii::createWebApplication($evn->configWeb)->run();