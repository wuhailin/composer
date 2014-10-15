<?php

/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 2014/10/12
 * Time: 14:42
 */
class Controller extends \common\component\Controller
{
    public function init()
    {
        parent::init();
        $this->layout = $this->app->user->isGuest ? '//layouts/main' : '//layouts/backend';
    }

    public function accessRules()
    {
        return array_merge(parent::accessRules(), [
            [
                'allow',
                'actions' => ['login', 'error', 'captcha'],//所有用户可查看
                'users'   => ['*'],
            ],
            [
                'allow',
                'actions' => ['index', 'logout'],//登录用户查看
                'users'   => ['@'],
            ],
            [
                'deny',
                'users' => ['*'],
            ]
        ]);
    }

    public function behaviors()
    {
        return [];
    }
} 