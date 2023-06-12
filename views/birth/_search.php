<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\BirthSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="birth-search" style="float:right;">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
            'class' => 'form-inline', // Add 'form-inline' class for inline form display
        ],
    ]); ?>
    <div class="row form-group">
        <div class="col">
            <?= $form->field($model, 'birthsearch')->textInput(['placeholder' => 'Search', 'class' => 'form-control form-control-sm nepalify'])->label(false) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>