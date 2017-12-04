<?php

use yii\bootstrap\Nav;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h4>My page</h4>

<? if (count($images)) { ?>
    <? foreach ($images as $item) { ?>
        <div class="well">
            <p><?= $item[name] ?></p>
            <p><?= $item[path] ?></p>
        </div>
    <? } ?>
<? } ?>