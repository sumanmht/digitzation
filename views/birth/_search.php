<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BirthSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="birth-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'registrar_name') ?>

    <?= $form->field($model, 'reg_no') ?>

    <?= $form->field($model, 'reg_year') ?>

    <?= $form->field($model, 'reg_month') ?>

    <?php // echo $form->field($model, 'reg_day') ?>

    <?php // echo $form->field($model, 'fname') ?>

    <?php // echo $form->field($model, 'mname') ?>

    <?php // echo $form->field($model, 'lname') ?>

    <?php // echo $form->field($model, 'birth_year') ?>

    <?php // echo $form->field($model, 'birth_month') ?>

    <?php // echo $form->field($model, 'birth_day') ?>

    <?php // echo $form->field($model, 'birth_place') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'birth_type') ?>

    <?php // echo $form->field($model, 'grandfather_fname') ?>

    <?php // echo $form->field($model, 'grandfather_mname') ?>

    <?php // echo $form->field($model, 'grandfather_lname') ?>

    <?php // echo $form->field($model, 'father_fname') ?>

    <?php // echo $form->field($model, 'father_mname') ?>

    <?php // echo $form->field($model, 'father_lname') ?>

    <?php // echo $form->field($model, 'permanent_address') ?>

    <?php // echo $form->field($model, 'age_when_birth') ?>

    <?php // echo $form->field($model, 'bith_country') ?>

    <?php // echo $form->field($model, 'father_ctz_no') ?>

    <?php // echo $form->field($model, 'father_ctz_year') ?>

    <?php // echo $form->field($model, 'father_ctz_month') ?>

    <?php // echo $form->field($model, 'father_ctz_day') ?>

    <?php // echo $form->field($model, 'father_ctz_district') ?>

    <?php // echo $form->field($model, 'mother_fname') ?>

    <?php // echo $form->field($model, 'mother_mname') ?>

    <?php // echo $form->field($model, 'mother_lname') ?>

    <?php // echo $form->field($model, 'mother_ctz_no') ?>

    <?php // echo $form->field($model, 'mother_ctz_year') ?>

    <?php // echo $form->field($model, 'mother_ctz_month') ?>

    <?php // echo $form->field($model, 'mother_ctz_day') ?>

    <?php // echo $form->field($model, 'mother_ctz_district') ?>

    <?php // echo $form->field($model, 'father_education') ?>

    <?php // echo $form->field($model, 'mother_education') ?>

    <?php // echo $form->field($model, 'father_mother_tongue') ?>

    <?php // echo $form->field($model, 'mother_mother_tongue') ?>

    <?php // echo $form->field($model, 'birth_count') ?>

    <?php // echo $form->field($model, 'living_count') ?>

    <?php // echo $form->field($model, 'helper') ?>

    <?php // echo $form->field($model, 'married_year') ?>

    <?php // echo $form->field($model, 'informant_fname') ?>

    <?php // echo $form->field($model, 'informant_mname') ?>

    <?php // echo $form->field($model, 'informant_lname') ?>

    <?php // echo $form->field($model, 'relation') ?>

    <?php // echo $form->field($model, 'inf_ctz_no') ?>

    <?php // echo $form->field($model, 'inf_ctz_year') ?>

    <?php // echo $form->field($model, 'inf_ctz_month') ?>

    <?php // echo $form->field($model, 'inf_ctz_day') ?>

    <?php // echo $form->field($model, 'inf_ctz_district') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
