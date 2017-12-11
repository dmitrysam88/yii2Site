<?php

namespace app\controllers;

use Yii;
use app\models\Comment;
use app\models\File;
use app\models\Post;
use app\models\User;
use yii\helpers\ArrayHelper;

class CommentController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $isGuest = Yii::$app->user->getIsGuest();

        $comment = new Comment();

        if($comment->load(Yii::$app->request->post()) && $comment->validate()){
            $comment->setAttribute('post_id', $id);
            $comment->setAttribute('user_id', Yii::$app->user->identity->getId());
            $comment->setAttribute('created', "".date('Y-m-d H:i:s'));
            $comment->save();
            return $this->redirect(['index', 'id' => $id]);
        } else {
            $post = Post::findOne($id);
            $model = Comment::find()->where(['post_id' => $id])->all();
            $userId = ArrayHelper::getColumn($model, 'user_id');
            $path = "/" . File::findOne($post->file_id)->path;
            $user = ArrayHelper::map(User::findAll($userId), 'id', 'username');

            return $this->render('index', [
                'post'      => $post,
                'model'     => $model,
                'path'      => $path,
                'user'      => $user,
                'comment'   => $comment,
                'isGuest'   => $isGuest,
            ]);
        }
    }


    public function actionDelete($id){

        $model = $this->findModel($id);
        $postId = $model->post_id;
        $model->delete();

        return $this->redirect(['index', 'id' => $postId]);

    }

    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
