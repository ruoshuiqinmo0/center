<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/1
 * Time: 10:03
 */

namespace app\modules\center\controllers;

use app\models\Product;
use yii\data\Pagination;
use Yii;

class ProductController extends BaseController
{
    public function actionIndex()
    {
        $product = Product::find();
        $pages = new Pagination(['totalCount' => $product->count(), 'pageSize' => 10]);
        $products = $product->limit($pages->limit)->offset($pages->offset)->all();
        return $this->render('index', ['products' => $products, 'pages' => $pages]);
    }

    public function actionAdd()
    {
        $model = new Product();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            if ($model->add($post)) {
                return $this->redirect(['index']);
            }
        }
        $sort = ['A','B','C','D','E','F','G','I','J','K','L','M','N','O','P','Q','R','S'];
        $model->product_no = $sort[(date('Y')-2018)].$sort[(date('m')-1)].date('dHi').rand(10,99);
        return $this->render('add', ['model' => $model]);
    }
}