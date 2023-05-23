<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mig $model */

$this->title = 'Update Migration: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Migs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mig-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'fams' => $fams,
    ]) ?>

</div>
