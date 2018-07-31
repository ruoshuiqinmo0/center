<?php

namespace app\modules\center\controllers;

use yii\web\Controller;

/**
 * Default controller for the `center` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'layout1';
        return $this->render('index');
    }

    /***
     * @return string
     */
    public function actionAdd(){
        $this->layout = 'layout1';
        return $this->render('add');
    }

}
