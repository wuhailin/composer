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
        if(isset(self::$menus)){
            return self::$menus;
        }
        /**
         * @var CWebApplication $yii
         */
        $yii = Yii::app();
        self::$menus = [
            [
                'label' => '系统设置',
                //'visible' => !$yii->user->isGuest,
                'items' => [
                    [
                        'label' => '全局配置',
                    ]
                ]
            ],
            [
                'label' => '日志信息',
                'items' => [
                    [
                        'label' => '系统日志'
                    ],
                    [
                        'label' => '操作日志',
                    ]
                ]
            ]
        ];
        return self::getMenu();
    }
} 