<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mig $model */

$this->title = 'New Migration';
$this->params['breadcrumbs'][] = ['label' => 'Migs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mig-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'fams' => $fams,
    ]) ?>

</div>
