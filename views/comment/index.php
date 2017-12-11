<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

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
                <?= Html::a(Html::tag('span', null, ['class' => 'glyphicon glyphicon-trash']),Url::to(['comment/delete', 'id' => $item->id])) ?>
            </div>
        </div>
        <br>
    <? } ?>
<? } ?>

<? if (!$isGuest) { ?>
    <div class="dialog-create">
        <?= $this->render('_form', [
            'model' => $comment,
        ]) ?>
    </div>
<? } ?>
