<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MemberSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'inf_id') ?>

    <?= $form->field($model, 'member_fname') ?>

    <?= $form->field($model, 'member_mname') ?>

    <?= $form->field($model, 'member_lname') ?>

    <?php // echo $form->field($model, 'birth_year') ?>

    <?php // echo $form->field($model, 'birth_month') ?>

    <?php // echo $form->field($model, 'birth_day') ?>

    <?php // echo $form->field($model, 'mem_gender') ?>

    <?php // echo $form->field($model, 'mem_birth_place') ?>

    <?php // echo $form->field($model, 'relation_with_inf') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
