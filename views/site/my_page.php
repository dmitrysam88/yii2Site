<?php

use yii\bootstrap\Nav;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<? $f = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?=$f->field($form, 'file')->fileInput() ?>
    <?=Html::submitButton() ?>
<? ActiveForm::end() ?>
