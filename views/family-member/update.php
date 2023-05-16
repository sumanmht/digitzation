<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FamilyMember $model */

$this->title = 'Update Family Member: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Family Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="family-member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
