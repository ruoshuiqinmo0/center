<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31
 * Time: 15:01
 */

namespace app\modules\center\controllers;
use yii\web\Controller;

class LoginController extends Controller
{
      public function actionIndex(){
          $this->layout = false;
          return $this->render('index');
      }
}