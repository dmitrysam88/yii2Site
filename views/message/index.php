<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="well">
    <div class="row">
        <h2><?= $dialog->name ?></h2>
        <br>
        <p><?= $dialog->created ?></p>
    </div>
</div>

<? if (count($model)) { ?>
    <? foreach ($model as $item) { ?>
        <div class="row">
            <div class="col-lg-2">
                <p><b><?= $user[$item->user_id] ?>:</b></p>
                <p><?= $item->created?></p>
            </div>
            <div class="col-lg-10">
                <p><?= $item->text ?></p>
            </div>
        </div>
        <br>
    <? } ?>
<? } ?>
