<?php

namespace app\controllers;

use app\models\Dialog;
use app\models\Message;

class MessageController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $dialog = Dialog::findOne($id);
        $model  = Message::find()->where(['dialog_id' => $id])->all();

        return $this->render('index',[
            'dialog'    => $dialog,
            'model'     => $model,
        ]);
    }

}
