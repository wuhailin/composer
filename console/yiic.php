<?php

// set environment
require __DIR__ . '/../common/component/MyEnvironment.php';

$env = new common\component\MyEnvironment(__DIR__);

// run Yii app
$config = $env->configConsole;

require_once(__DIR__ . '/../common/yiic.php');