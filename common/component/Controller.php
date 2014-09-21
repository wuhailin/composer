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
 * @package common\component
 */
class Controller extends \CController
{
    /**
     * @var \BSApi
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
} 