<?php

namespace app\controllers;

use app\models\File;
use app\models\Post;
use yii\helpers\ArrayHelper;
use \yii\web\Controller;

class PostController extends Controller
{
    public function actionIndex()
    {
        $model = Post::find()->all();
        $idFile = ArrayHelper::getColumn($model,'file_id');
        $file = File::find($idFile)->all();
        $file = ArrayHelper::map($file,'id','path');

        return $this->render('index',[
            'model' => $model,
            'file'  => $file,
        ]);
    }

    public function actionCreate(){

    }

}
