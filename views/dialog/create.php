<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dialog */

$this->title = 'Create Dialog';
//$this->params['breadcrumbs'][] = ['label' => 'Dialogs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dialog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
