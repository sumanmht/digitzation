<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Divorce $model */

$this->title = 'Create Divorce';
$this->params['breadcrumbs'][] = ['label' => 'Divorces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="divorce-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>