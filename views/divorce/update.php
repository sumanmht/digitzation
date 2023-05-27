<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Divorce $model */

$this->title = 'Update Divorce: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Divorces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="divorce-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
