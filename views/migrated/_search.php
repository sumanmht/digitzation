<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MigratedSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="migrated-search">

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

    <?php // echo $form->field($model, 'inf_fname') ?>

    <?php // echo $form->field($model, 'inf_mname') ?>

    <?php // echo $form->field($model, 'inf_lname') ?>

    <?php // echo $form->field($model, 'inf_birth_year') ?>

    <?php // echo $form->field($model, 'inf_birth_month') ?>

    <?php // echo $form->field($model, 'inf_birth_day') ?>

    <?php // echo $form->field($model, 'inf_gender') ?>

    <?php // echo $form->field($model, 'inf_birth_place') ?>

    <?php // echo $form->field($model, 'inf_ctz_no') ?>

    <?php // echo $form->field($model, 'inf_ctz_year') ?>

    <?php // echo $form->field($model, 'inf_ctz_month') ?>

    <?php // echo $form->field($model, 'inf_ctz_day') ?>

    <?php // echo $form->field($model, 'inf_ctz_district') ?>

    <?php // echo $form->field($model, 'inf_education') ?>

    <?php // echo $form->field($model, 'inf_occupation') ?>

    <?php // echo $form->field($model, 'inf_religion') ?>

    <?php // echo $form->field($model, 'inf_mother_tongue') ?>

    <?php // echo $form->field($model, 'going_district') ?>

    <?php // echo $form->field($model, 'going_local_level') ?>

    <?php // echo $form->field($model, 'going_ward') ?>

    <?php // echo $form->field($model, 'coming_district') ?>

    <?php // echo $form->field($model, 'coming_local_level') ?>

    <?php // echo $form->field($model, 'coming_ward') ?>

    <?php // echo $form->field($model, 'migration_year') ?>

    <?php // echo $form->field($model, 'migration_month') ?>

    <?php // echo $form->field($model, 'migration_day') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'migration_scanned_image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
