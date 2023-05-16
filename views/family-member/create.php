<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FamilyMember $model */

$this->title = 'Create Family Member';
$this->params['breadcrumbs'][] = ['label' => 'Family Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
