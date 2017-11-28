<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User_dialog */

$this->title = 'Create User Dialog';
$this->params['breadcrumbs'][] = ['label' => 'User Dialogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-dialog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user'  => $user,
        'dialog'=> $dialog,
    ]) ?>

</div>