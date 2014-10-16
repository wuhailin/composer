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
        $this->modelName = ucfirst($this->id);
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

    public function getBreadcrumbs()
    {
        if(isset($this->breadcrumbs)){
            return $this->breadcrumbs;
        }
        $action = $this->action->id;
        $model = $this->model;
        $breadcrumbs = [
            $model->modelName = ['index'],
        ];
        return $this->breadcrumbs = $breadcrumbs;
    }
} 