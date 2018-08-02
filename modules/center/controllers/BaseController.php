<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/1
 * Time: 10:30
 */

namespace app\modules\center\controllers;


use yii\web\Controller;
use Yii;
class BaseController extends Controller
{
    public  $layout = 'layout1';

    public function init(){
        if(!Yii::$app->session->has('developer_id')){
            return $this->redirect(['/center/login/index']);
        }
    }

}