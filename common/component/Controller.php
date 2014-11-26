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
 * @property string      $metaTitle
 * @property string      $metaKeywords
 * @property string      $metaDescription
 * @property \CAction    $action
 * @property string      $id
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

    /**
     * @var ActiveRecord
     */
    public $model;

    /**
     * @var string
     */
    public $modelName;

    public $angularName = '';

    protected $breadcrumbs;
    public $menu;

    public function init()
    {
        $this->bootstrap = \Yii::app()->bootstrap;
        $this->app       = \Yii::app();
    }

    public function behaviors()
    {
        return [
            'seo' => [ //SEO  需要给metaKeywords|metaDescription赋值实现
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
        return [];
    }

    /**
     * @param int|string $id
     * @param bool       $throw
     * @return ActiveRecord
     * @throws \CHttpException
     */
    final public function loadModel($id, $throw = true)
    {
        /**
         * @var ActiveRecord $model
         */
        $model = ActiveRecord::model($this->modelName);
        $model = $model->findByPk($id);
        if ($throw && null === $model) {
            throw new \CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }
}