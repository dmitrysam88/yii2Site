<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<h2>Posts</h2>

<? if (count($model)) { ?>
    <? foreach ($model as $item) { ?>
        <a href=<?= Url::to(['comment/index', 'id' => $item->id]) ?>>
            <div class="well">
                <div class="row">
                    <div class="col-lg-2">
                        <?= Html::img("/" . $file[$item->file_id], ['class' => 'img-responsive']) ?>
                    </div>
                    <div class="col-lg-10">
                        <h4><?= $item->name ?></h4>
                        <p><?= $item->text ?></p>
                        <p><?= $item->created ?></p>
                    </div>
                </div>
            </div>
        </a>
    <? } ?>
<? } ?>
