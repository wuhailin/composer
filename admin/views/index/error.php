<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/10/13
 * Time: 15:05
 * @var IndexController $this
 */
$error = Yii::app()->errorHandler->error;
new Dump($this->app->errorHandler->error);