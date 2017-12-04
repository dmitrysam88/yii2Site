<?php

namespace app\controllers;

use Yii;
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

    public function actionCreate()
    {
        $file   = File::find()->all();
        $model  = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->setAttribute('user_id', Yii::$app->user->identity->getId());
            $model->setAttribute('created', "".date('Y-m-d H:i:s'));
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'file'  => $file,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $file   = File::find()->all();
        $model  = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'file'  => $file,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
