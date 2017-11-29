<?php

namespace app\controllers;

use app\models\Dialog;
use \yii\web\Controller;

class DialogController extends Controller
{
    public function actionIndex()
    {
        $model  = Dialog::find()->all();

        return $this->render('index',[
            'model' => $model,
        ]);
    }

}
