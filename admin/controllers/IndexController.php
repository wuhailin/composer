<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-20
 * Time: 下午9:43
 */

class IndexController extends \common\component\Controller
{
    public $model;

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
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new common\model\Article('search');
        $model->unsetAttributes();
        $this->render($this->action->id, [
            'model' => $model,
        ]);
    }

    public function actionError()
    {
    }

    public function actionLogin()
    {
        if(!$this->app->user->isGuest){
            $this->redirect(array('index'));
        }
        $model = new LoginForm('create');
        $model->unsetAttributes();
        $modelName = CHtml::modelName($model);
        if(isset($_POST[$modelName])){
            //$this->app->user->logout();
            $model->setAttributes($_POST[$modelName]);
            if($model->validate() && $model->login()){
                $this->redirect($this->app->user->returnUrl);
            }
        }
        $this->render($this->action->id, [
            'model' => $model,
        ]);
    }
}