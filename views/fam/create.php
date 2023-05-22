<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fam $model */

$this->title = 'Create Fam';
$this->params['breadcrumbs'][] = ['label' => 'Fams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
