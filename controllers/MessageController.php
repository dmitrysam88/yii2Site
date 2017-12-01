<?php

namespace app\controllers;

use app\models\Dialog;
use app\models\Message;
use app\models\User;
use yii\helpers\ArrayHelper;

class MessageController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $dialog = Dialog::findOne($id);
        $model  = Message::find()->where(['dialog_id' => $id])->all();
        $userId = ArrayHelper::getColumn($model,'user_id');
        $user   = ArrayHelper::map(User::findAll($userId),'id','username');

        return $this->render('index',[
            'dialog'    => $dialog,
            'model'     => $model,
            'user'      => $user,
        ]);
    }

}
