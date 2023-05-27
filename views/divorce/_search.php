<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DivorceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="divorce-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'district') ?>

    <?= $form->field($model, 'local_level') ?>

    <?= $form->field($model, 'ward') ?>

    <?= $form->field($model, 'reg_no') ?>

    <?php // echo $form->field($model, 'reg_year') ?>

    <?php // echo $form->field($model, 'reg_month') ?>

    <?php // echo $form->field($model, 'reg_day') ?>

    <?php // echo $form->field($model, 'registrar_name') ?>

    <?php // echo $form->field($model, 'marriage_year') ?>

    <?php // echo $form->field($model, 'marriage_month') ?>

    <?php // echo $form->field($model, 'marriage_day') ?>

    <?php // echo $form->field($model, 'groom_fname') ?>

    <?php // echo $form->field($model, 'groom_mname') ?>

    <?php // echo $form->field($model, 'groom_lname') ?>

    <?php // echo $form->field($model, 'g_birth_year') ?>

    <?php // echo $form->field($model, 'g_birth_month') ?>

    <?php // echo $form->field($model, 'g_birth_day') ?>

    <?php // echo $form->field($model, 'g_place_of_birth') ?>

    <?php // echo $form->field($model, 'g_permanent_address') ?>

    <?php // echo $form->field($model, 'g_education') ?>

    <?php // echo $form->field($model, 'g_religion') ?>

    <?php // echo $form->field($model, 'g_mother_tongue') ?>

    <?php // echo $form->field($model, 'g_prev_marital_status') ?>

    <?php // echo $form->field($model, 'g_ctz_no') ?>

    <?php // echo $form->field($model, 'g_ctz_year') ?>

    <?php // echo $form->field($model, 'g_ctz_month') ?>

    <?php // echo $form->field($model, 'g_ctz_day') ?>

    <?php // echo $form->field($model, 'g_ctz_district') ?>

    <?php // echo $form->field($model, 'g_grand_fname') ?>

    <?php // echo $form->field($model, 'g_grand_mname') ?>

    <?php // echo $form->field($model, 'g_grand_lname') ?>

    <?php // echo $form->field($model, 'g_father_fname') ?>

    <?php // echo $form->field($model, 'g_father_mname') ?>

    <?php // echo $form->field($model, 'g_father_lname') ?>

    <?php // echo $form->field($model, 'bride_fname') ?>

    <?php // echo $form->field($model, 'bride_mname') ?>

    <?php // echo $form->field($model, 'bride_lname') ?>

    <?php // echo $form->field($model, 'b_birth_year') ?>

    <?php // echo $form->field($model, 'b_birth_month') ?>

    <?php // echo $form->field($model, 'b_birth_day') ?>

    <?php // echo $form->field($model, 'b_place_of_birth') ?>

    <?php // echo $form->field($model, 'b_permanent_address') ?>

    <?php // echo $form->field($model, 'b_education') ?>

    <?php // echo $form->field($model, 'b_religion') ?>

    <?php // echo $form->field($model, 'b_mother_tongue') ?>

    <?php // echo $form->field($model, 'b_prev_marital_status') ?>

    <?php // echo $form->field($model, 'b_ctz_no') ?>

    <?php // echo $form->field($model, 'b_ctz_year') ?>

    <?php // echo $form->field($model, 'b_ctz_month') ?>

    <?php // echo $form->field($model, 'b_ctz_day') ?>

    <?php // echo $form->field($model, 'b_ctz_district') ?>

    <?php // echo $form->field($model, 'b_grand_fname') ?>

    <?php // echo $form->field($model, 'b_grand_mname') ?>

    <?php // echo $form->field($model, 'b_grand_lname') ?>

    <?php // echo $form->field($model, 'b_father_fname') ?>

    <?php // echo $form->field($model, 'b_father_mname') ?>

    <?php // echo $form->field($model, 'b_father_lname') ?>

    <?php // echo $form->field($model, 'total_child') ?>

    <?php // echo $form->field($model, 'living_child') ?>

    <?php // echo $form->field($model, 'with_father') ?>

    <?php // echo $form->field($model, 'with_mother') ?>

    <?php // echo $form->field($model, 'inf_fname') ?>

    <?php // echo $form->field($model, 'inf_mname') ?>

    <?php // echo $form->field($model, 'inf_lname') ?>

    <?php // echo $form->field($model, 'inf_ctz_no') ?>

    <?php // echo $form->field($model, 'inf_ctz_year') ?>

    <?php // echo $form->field($model, 'inf_ctz_month') ?>

    <?php // echo $form->field($model, 'inf_ctz_day') ?>

    <?php // echo $form->field($model, 'inf_ctz_district') ?>

    <?php // echo $form->field($model, 'court_address') ?>

    <?php // echo $form->field($model, 'court_name') ?>

    <?php // echo $form->field($model, 'decison_year') ?>

    <?php // echo $form->field($model, 'decison_month') ?>

    <?php // echo $form->field($model, 'decision_day') ?>

    <?php // echo $form->field($model, 'di_scanned_image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
