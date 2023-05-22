<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FamSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fam-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mem_fname') ?>

    <?= $form->field($model, 'mem_mname') ?>

    <?= $form->field($model, 'mem_lname') ?>

    <?= $form->field($model, 'birth_year') ?>

    <?php // echo $form->field($model, 'birth_month') ?>

    <?php // echo $form->field($model, 'birth_day') ?>

    <?php // echo $form->field($model, 'inf_id') ?>

    <?php // echo $form->field($model, 'mem_birth_place') ?>

    <?php // echo $form->field($model, 'mem_gender') ?>

    <?php // echo $form->field($model, 'relation_with_inf') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
