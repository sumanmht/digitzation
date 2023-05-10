<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Birth $model */

$this->title = 'Create Birth';
$this->params['breadcrumbs'][] = ['label' => 'Births', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="birth-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
