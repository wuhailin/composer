<?php

/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/9/28
 * Time: 12:46
 */
class Menus
{
    private static $menus;

    public static function getMenu()
    {
        if (isset(self::$menus)) {
            return self::$menus;
        }
        /**
         * @var CWebApplication $yii
         */
        $yii         = Yii::app();
        self::$menus = array(
            array(
                'label' => '系统设置',
            ),
            'config'  => array(
                'label' => '基本配置',
                'url'   => $yii->createUrl('config'),
            ),
            array(
                'label' => '测试',
            ),
            'profile' => array(
                'label' => '测试1',
                'url'   => '#'
            ),
            array(
                'end' => true,
            ),
            array(
                'end' => true,
            ),
        );
        return self::getMenu();
    }
}