<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Divorce $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="divorce-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ward')->textInput() ?>

    <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registrar_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marriage_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marriage_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marriage_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groom_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groom_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groom_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_birth_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_birth_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_birth_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_place_of_birth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_permanent_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_mother_tongue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_prev_marital_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_ctz_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_ctz_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_ctz_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_ctz_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_ctz_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_grand_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_grand_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_grand_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_father_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_father_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_father_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bride_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bride_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bride_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_birth_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_birth_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_birth_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_place_of_birth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_permanent_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_mother_tongue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_prev_marital_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_ctz_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_ctz_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_ctz_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_ctz_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_ctz_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_grand_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_grand_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_grand_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_father_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_father_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_father_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_child')->textInput() ?>

    <?= $form->field($model, 'living_child')->textInput() ?>

    <?= $form->field($model, 'with_father')->textInput() ?>

    <?= $form->field($model, 'with_mother')->textInput() ?>

    <?= $form->field($model, 'inf_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_ctz_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_ctz_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_ctz_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_ctz_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inf_ctz_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'decison_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'decison_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'decision_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'di_scanned_image')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
