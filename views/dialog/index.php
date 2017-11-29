<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<h2>Dialogs</h2>

<? if (count($model)) { ?>
    <? foreach ($model as $item) { ?>
        <a href=<?= Url::to(['message/index', 'id' => $item->id]) ?>>
            <div class="well">
                <div class="row">
                    <h4><?= $item->name ?></h4>
                    <p><?= $item->created ?></p>
                </div>
            </div>
        </a>
    <? } ?>
<? } ?>