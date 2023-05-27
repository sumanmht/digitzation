<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marriage $model */

$this->title = 'Create Marriage';
$this->params['breadcrumbs'][] = ['label' => 'Marriages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marriage-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>