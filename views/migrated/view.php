<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Migrated $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Migrateds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="migrated-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'registrar_name',
            'reg_no',
            'reg_year',
            'reg_month',
            'reg_day',
            'inf_fname',
            'inf_mname',
            'inf_lname',
            'inf_birth_year',
            'inf_birth_month',
            'inf_birth_day',
            'inf_gender',
            'inf_birth_place',
            'inf_ctz_no',
            'inf_ctz_year',
            'inf_ctz_month',
            'inf_ctz_day',
            'inf_ctz_district',
            'inf_education',
            'inf_occupation',
            'inf_religion',
            'inf_mother_tongue',
            'going_district',
            'going_local_level',
            'going_ward',
            'coming_district',
            'coming_local_level',
            'coming_ward',
            'migration_year',
            'migration_month',
            'migration_day',
            'reason',
            'migration_scanned_image',
        ],
    ]) ?>

</div>
