<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-20
 * Time: 下午9:43
 */

class IndexController extends CController
{
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'system.web.widgets.captcha.CCaptchaAction',
                'minLength' => 4,
                'maxLength' => 6,
            ]
        ];
    }
    public function actionIndex()
    {
        $startTime = microtime(true);
        Article::model()->findAll();
        $endTime = microtime(true);
        echo sprintf('%.4f',$endTime - $startTime);
        Article::model()->findAll();
        $endTime = microtime(true);
        echo sprintf('<br>%.4f', $endTime - $endTime);
        Article::model()->findAll();
        $endTime = microtime(true);
        echo sprintf('<br>%.4f', $endTime - $endTime);
    }
} 