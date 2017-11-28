<?php

namespace app\controllers;

use app\models\Comment;
use app\models\File;
use app\models\Post;
use app\models\User;
use yii\helpers\ArrayHelper;

class CommentController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $post   = Post::findOne($id);
        $model  = Comment::find()->where(['post_id' => $id])->all();
        $userId = ArrayHelper::getColumn($model,'user_id');
        $path   = "/".File::findOne($post->file_id)->path;
        $user   = ArrayHelper::map(User::findAll($userId),'id','username');

        return $this->render('index',[
            'post'  => $post,
            'model' => $model,
            'path'  => $path,
            'user'  =>$user,
        ]);
    }

}
