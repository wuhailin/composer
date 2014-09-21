<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-20
 * Time: 下午9:43
 */

class IndexController extends \common\component\Controller
{
    public function init()
    {
        parent::init();
        $this->metaKeywords = $this->metaDescription = $this->app->name;
    }

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
        $model = new common\model\Article('search');
        $this->render($this->action->id, [
            'model' => $model,
        ]);
    }
} 