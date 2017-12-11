<?php

namespace app\controllers;

use Yii;
use app\models\Dialog;
use app\models\DialogSearch;
use yii\helpers\ArrayHelper;
use \yii\web\Controller;
use app\models\User_Dialog;

class DialogController extends Controller
{
    public function actionIndex()
    {
        $user_dialog = User_Dialog::find()->where(['user_id' => Yii::$app->getUser()->getId()])->all();
        $dialogID = ArrayHelper::getColumn($user_dialog,'dialog_id');
        $model = Dialog::findAll($dialogID);

        return $this->render('index',[
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Dialog();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->setAttribute('created', "".date('Y-m-d H:i:s'));
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Dialog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
