<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FamilyMember $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="family-member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inf_id')->textInput() ?>

    <?= $form->field($model, 'member_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_birth_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relation_with_inf')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
