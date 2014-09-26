<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-21
 * Time: 下午1:57
 */

namespace common\component;

/**
 * Class Controller
 * @property string $metaTitle
 * @property string $metaKeywords
 * @property string $metaDescription
 * @property \CAction    $action
 * @property string $id
 * @package common\component
 */
class Controller extends \CController
{
    /**
     * @var \Bootstrap
     */
    public $bootstrap;

    /**
     * @var \CWebApplication
     */
    public $app;

    public function init()
    {
        $this->bootstrap = \Yii::app()->bootstrap;
        $this->app = \Yii::app();
    }

    public function behaviors()
    {
        return [
            'seo' => [//SEO  需要给metaKeywords|metaDescription赋值实现
                'class' => 'vendor.crisu83.yii-seo.behaviors.SeoBehavior'
            ],
        ];
    }

    public function filters()
    {
        return ['accessControl'];
    }

    public function accessRules()
    {
        return [
            [
                'allow',
                'actions' => ['login', 'error'],//所有用户可查看
                'users' => ['*'],
            ],
            [
                'allow',
                'actions' => ['index', 'logout'],//登录用户查看
                'users' => ['@'],
            ],
            [
                'deny',
                'users' => ['*'],
            ]
        ];
    }
}