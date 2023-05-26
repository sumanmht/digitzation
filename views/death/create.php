<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Death $model */

$this->title = 'Create Death';
$this->params['breadcrumbs'][] = ['label' => 'Deaths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="death-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
