<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/1
 * Time: 10:03
 */

namespace app\modules\center\controllers;

class ProductController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}