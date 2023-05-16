<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Registrar;
use app\models\District;
/** @var yii\web\View $this */
/** @var app\models\Migrated $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class ="card">
    <div class="card-body">
        <div class="migrated-form">

            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:13px;', 'class' =>'nepali'],
                'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
            ]); ?>
            <hr>
            <label>दर्ता विवरण</label>
            <div class="row form-group">
                <div class="col-sm-1">
                    <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता नं.'])->label('') ?>
                </div>
                <div class="col-sm-1">
                    <?= $form->field($model, 'reg_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label('') ?>
                </div>
                <div class="col-sm-1">
                    <?= $form->field($model, 'reg_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label('') ?>
                </div>
                <div class="col-sm-1">
                    <?= $form->field($model, 'reg_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label('') ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'registrar_name')->label(' ')->dropdownList(
                        ArrayHelper::map(Registrar::find()->all(),'name', 'name'),
                        ['prompt'=>'',
                         'placeholder' => '',
                        'class' => 'form-control form-control-sm' ]
                    )?>
                </div>
            </div>
            <hr>
            <label>सूचकको विवरण</label>
            <div class="row form-group">
                <div class="col-sm-6">
                    <label>सूचकको नाम</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label>जन्म मिति</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_birth_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_birth_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_birth_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <label>लिङ्ग</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_gender')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'लिङ्ग'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label>जन्मस्थान</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_birth_place')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मस्थान'])->label('') ?>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-sm-2">
                    <label>नागरिकता विवरण</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label>नागरिकता विवरण</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label>नागरिकता विवरण</label>
                    <div class="row">
                        <div class="col-sm-7">
                            <?= $form->field($model, 'inf_ctz_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(),'name', 'name'),
                                ['prompt'=>'जिल्ला',
                                 'class' => 'form-control form-control-sm',
                                 'id' => 'father_ctz_district']
                            ) ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $form->field($model, 'inf_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm','placeholder' =>'शैक्षिक योग्यता'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label>Any</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_occupation')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm','placeholder' =>'पेशा'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm','placeholder' =>'धर्म'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm','placeholder' =>'मातृभाषा'])->label('') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <?= $form->field($model, 'going_district')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'going_local_level')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'going_ward')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'coming_district')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'coming_local_level')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'coming_ward')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'migration_year')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'migration_month')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'migration_day')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'migration_scanned_image')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
