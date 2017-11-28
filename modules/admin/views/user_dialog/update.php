<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User_dialog */

$this->title = 'Update User Dialog: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Dialogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-dialog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user'  => $user,
        'dialog'=> $dialog,
    ]) ?>

</div>
