<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/9/27
 * Time: 12:23
 */
Yii::import('system.zii.widgets.CMenu');
class Menus extends CMenu
{
    public function run()
    {
        $this->Items();
        parent::renderMenu($this->Items());
    }

    protected function Items()
    {
        return $this->items = [
            'home' => [
                'label' => '测试',
                'items' => [
                    [
                        'label' => '1111',
                    ],
                    [
                        'label' => '2222',
                        'visible' => Yii::app()->user->checkAccess('admin'),
                    ]
                ]
            ]
        ];
    }
}