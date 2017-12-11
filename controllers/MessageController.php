<?php

namespace app\controllers;

use Yii;
use app\models\Dialog;
use app\models\Message;
use app\models\User;
use yii\helpers\ArrayHelper;

class MessageController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $message = new Message();

        if ($message->load(Yii::$app->request->post()) && $message->validate()){
            $message->setAttribute('dialog_id', $id);
            $message->setAttribute('user_id', Yii::$app->user->identity->getId());
            $message->setAttribute('created', "".date('Y-m-d H:i:s'));
            $message->save();
            return $this->redirect(['index', 'id' => $id]);
        } else {

            $dialog = Dialog::findOne($id);
            $model = Message::find()->where(['dialog_id' => $id])->all();
            $userId = ArrayHelper::getColumn($model, 'user_id');
            $user = ArrayHelper::map(User::findAll($userId), 'id', 'username');

            return $this->render('index', [
                'dialog' => $dialog,
                'model' => $model,
                'user' => $user,
                'message' => $message,
            ]);
        }
    }

    public function actionDelete($id){

        $model = $this->findModel($id);
        $dilogId = $model->dialog_id;
        $model->delete();

        return $this->redirect(['index', 'id' => $dilogId]);

    }

    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
