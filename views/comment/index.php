<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>


<div class="well">
    <div class="row">
        <div class="col-lg-2">
            <?= Html::img($path, ['class' => 'img-responsive']) ?>
        </div>
        <div class="col-lg-10">
            <h2><?= $post->name ?></h2>
            <br>
            <p><?= $post->text ?></p>
            <p><?= $post->created ?></p>
        </div>
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
