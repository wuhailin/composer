<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-20
 * Time: 下午9:43
 */

class IndexController extends Controller
{
    public $model;

    public function init()
    {
        parent::init();
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
        $model = \common\model\Article::model()->findByPk(314);
        $this->render($this->action->id, [
        ]);
    }

    /**
     * 错误信息页面
     */
    public function actionError()
    {
        $this->render($this->action->id);
    }

    /**
     * 用户登录
     */
    public function actionLogin()
    {
        $this->layout = '//layouts/main';
        if(!$this->app->user->isGuest){
            $this->redirect(array('index'));
        }
        $model = new LoginForm('create');
        $model->unsetAttributes();
        $modelName = CHtml::modelName($model);
        if(isset($_POST[$modelName])){
            $model->setAttributes($_POST[$modelName]);
            if($model->validate() && $model->login()){
                $this->redirect($this->app->user->returnUrl);
            }
        }
        $this->render($this->action->id, [
            'model' => $model,
        ]);
    }

    /**
     * 用户退出操作
     */
    public function actionLogout()
    {
        $this->app->user->logout();
        $this->redirect($this->createAbsoluteUrl('index/login'));
    }
}