<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31
 * Time: 15:01
 */

namespace app\modules\center\controllers;

use app\models\Developer;
use yii\web\Controller;
use Yii;

class LoginController extends Controller
{
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'transparent' => true,//透明度
                'backColor' => 0x000000,//背景颜色
                'maxLength' => 4,//验证码最多字数
                'minLength' => 4,//验证码最少字数
                'testLimit' => 1,//验证几次后刷新
            ]
        ];
    }

    public function actionIndex()
    {
        $this->layout = false;
        $model = new Developer();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            if ($model->login($post)) {
                return $this->redirect(['/center/product/index']);
            }
        }
        return $this->render('index', ['model' => $model]);
    }


    public function actionLayout()
    {
        Yii::$app->session->removeAll();
        return $this->redirect(['/center/login/index']);
    }


}