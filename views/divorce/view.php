<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Divorce $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Divorces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="divorce-view">

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
            'district',
            'local_level',
            'ward',
            'reg_no',
            'reg_year',
            'reg_month',
            'reg_day',
            'registrar_name',
            'marriage_year',
            'marriage_month',
            'marriage_day',
            'groom_fname',
            'groom_mname',
            'groom_lname',
            'g_birth_year',
            'g_birth_month',
            'g_birth_day',
            'g_place_of_birth',
            'g_permanent_address',
            'g_education',
            'g_religion',
            'g_mother_tongue',
            'g_prev_marital_status',
            'g_ctz_no',
            'g_ctz_year',
            'g_ctz_month',
            'g_ctz_day',
            'g_ctz_district',
            'g_grand_fname',
            'g_grand_mname',
            'g_grand_lname',
            'g_father_fname',
            'g_father_mname',
            'g_father_lname',
            'bride_fname',
            'bride_mname',
            'bride_lname',
            'b_birth_year',
            'b_birth_month',
            'b_birth_day',
            'b_place_of_birth',
            'b_permanent_address',
            'b_education',
            'b_religion',
            'b_mother_tongue',
            'b_prev_marital_status',
            'b_ctz_no',
            'b_ctz_year',
            'b_ctz_month',
            'b_ctz_day',
            'b_ctz_district',
            'b_grand_fname',
            'b_grand_mname',
            'b_grand_lname',
            'b_father_fname',
            'b_father_mname',
            'b_father_lname',
            'total_child',
            'living_child',
            'with_father',
            'with_mother',
            'inf_fname',
            'inf_mname',
            'inf_lname',
            'inf_ctz_no',
            'inf_ctz_year',
            'inf_ctz_month',
            'inf_ctz_day',
            'inf_ctz_district',
            'court_address',
            'court_name',
            'decison_year',
            'decison_month',
            'decision_day',
            'di_scanned_image',
        ],
    ]) ?>

</div>
