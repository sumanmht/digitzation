<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Migrated $model */

$this->title = 'Create Migrated';
$this->params['breadcrumbs'][] = ['label' => 'Migrateds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="migrated-create">

    <?= $this->render('_form', [
        'model' => $model,
        'mems' => $mems,
    ]) ?>

</div>
