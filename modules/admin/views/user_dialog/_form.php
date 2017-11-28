<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User_dialog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-dialog-form">

    <?
        $itemsUs    = ArrayHelper::map($user,'id','username');
        $itemsDl    = ArrayHelper::map($dialog,'id','name');
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dialog_id')->dropDownList($itemsDl) ?>

    <?= $form->field($model, 'user_id')->dropDownList($itemsUs) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
