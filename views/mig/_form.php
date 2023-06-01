<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\District;
use yii\helpers\ArrayHelper;
use app\models\Registrar;

/** @var yii\web\View $this */
/** @var app\models\Mig $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="card">
    <div class="card-body">
        <div class="migrated-form">
            <?php $form = ActiveForm::begin([
                'id' => 'dynamic-form',
                'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:12px;', 'class' => 'nepali'],
                'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
            ]); ?>
            <hr>
            <label>दर्ता विवरण</label>
            <div class="row form-group">
                <div class="col-sm-1">
                    <div class="form-heading">दर्ता नं.</div>
                    <div class="row">
                        <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता नं.'])->label(' ') ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label(' ')  ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="form-heading">बसाई सराई मिति(वि.स.)</div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'migration_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'migration_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'migration_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">स्थानिय पञ्जिकाधिकारी</div>
                    <?= $form->field($model, 'registrar_name')->label(' ')->dropdownList(
                        ArrayHelper::map(Registrar::find()->all(), 'name', 'name'),
                        [
                            'prompt' => '',
                            'placeholder' => '',
                            'class' => 'form-control form-control-sm'
                        ]
                    ) ?>
                </div>
            </div>


            <hr>
            <label>सूचकको विवरण</label>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">सूचकको नाम</div>
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
                    <div class="form-heading">जन्म मिति</div>
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
                    <div class="form-heading">लिङ्ग</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_gender')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'लिङ्ग'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जन्मस्थान</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_birth_place')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मस्थान'])->label('') ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकता विवरण</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">नागरिकता विवरण</div>
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
                    <div class="form-heading">नागरिकता विवरण</div>
                    <div class="row">
                        <div class="col-sm-7">
                            <?= $form->field($model, 'inf_ctz_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                [
                                    'prompt' => 'जिल्ला',
                                    'class' => 'form-control form-control-sm',
                                    'id' => 'father_ctz_district'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $form->field($model, 'inf_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्यता'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label>Any</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_occupation')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पेशा'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृभाषा'])->label('') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row form-check">
                <div class="form-check-inline ">
                    <label>बसाई सरी जाने
                        <input class="form-check-input" type="radio" name="radiobtn" id="goingbtn">
                    </label>
                </div>
                <div class="form-check-inline ">
                    <label>बसाई सरी आउने
                        <input class="form-check-input" type="radio" name="radiobtn" id="comingbtn">
                    </label>
                </div>

            </div>
            <hr>
            <div class="row hidden" id="goingrow">
                <div class="col">
                    <label>बसाई सरी जाने ठेगाना</label>
                    <div class="row ">
                        <div class="col-sm-2">
                            <?= $form->field($model, 'going_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                [
                                    'prompt' => 'जिल्ला',
                                    'class' => 'form-control form-control-sm',
                                    'id' => 'father_ctz_district'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'going_local_level')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                        <div class="col-sm-1">
                            <?= $form->field($model, 'going_ward')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row hidden" id="comingrow">
                <div class="col">
                    <label>बसाई सरी आएको ठेगाना</label>
                    <div class="row ">
                        <div class="col-sm-2">
                            <?= $form->field($model, 'coming_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                [
                                    'prompt' => 'जिल्ला',
                                    'class' => 'form-control form-control-sm',
                                    'id' => 'father_ctz_district'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'coming_local_level')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                        <div class="col-sm-1">
                            <?= $form->field($model, 'coming_ward')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 15, // the maximum times, an element can be added (default 999)
                'min' => 0, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $fams[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'mem_fname',
                    'mem_mname',
                    'mem_lname',
                    'birth_year',
                    'birth_month',
                    'birth_day',
                    'mem_gender',
                    'mem_birth_place',
                    'relation_with_inf',
                ],
            ]); ?>

            <div class="card" style="overflow-x:auto;">
                <div class="card-header">Family members</div>
                <div class="card-body">
                    <div class="container-items">
                        <!-- widgetBody -->
                        <?php foreach ($fams as $i => $fam) : ?>
                            <!-- widgetItem -->
                            <?php
                            // necessary for update action.
                            if (!$fam->isNewRecord) {
                                echo Html::activeHiddenInput($fam, "[{$i}]id");
                            }
                            ?>
                            <div class="form form-group item ">
                                <div style="display: flex;">
                                    <div class="c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_fname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label('') ?>
                                    </div>
                                    <div class="c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_mname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label('') ?>
                                    </div>
                                    <div class="c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_lname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label('') ?>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]birth_year")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्म साल'])->label('') ?>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]birth_month")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्म महिना'])->label('') ?>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]birth_day")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्म गते'])->label('') ?>
                                    </div>
                                    <div class="c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_ctz_no")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label('') ?>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_ctz_year")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जारी साल'])->label('') ?>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_ctz_month")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जारी महिना'])->label('') ?>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_ctz_day")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जारी गते'])->label('') ?>
                                    </div>
                                    <div class="c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_ctz_district")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जारी जिल्ला'])->label('') ?>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]mem_gender")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'लिङ्ग'])->label('') ?>
                                    </div>
                                    <div class="c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <?= $form->field($fam, "[{$i}]relation_with_inf")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'सुचकसँगको नाता'])->label('') ?>
                                    </div>
                                    <div style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <a role="button"><i class="bi bi-dash-circle remove-item btn btn-sm btn-danger"></i></a>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                    <button type="button" class="add-item btn btn-success btn-sm ">Add Members</button>
                </div>
            </div>
            <?php DynamicFormWidget::end(); ?>

            <label>स्क्यान गरिएको फोटो अपलोड गर्नुहोस</label>
            <div class="row form-group ">
                <?= $form->field($model, 'm_scanned_image')->fileInput(['id' => 'mfileInput'])->label('') ?>
                <!-- Display the uploaded image file name -->
                <?= $model->m_scanned_image ?></p>

            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>
    <div class=" card-footer form-group">
        <?= Html::submitButton($fam->isNewRecord ? 'Save' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>
</div>



<style type="text/css">
    .hidden {
        display: none;
    }

    .c1 {
        flex-basis: 10%;
        max-width: 10%;
    }

    .c2 {
        flex-basis: 12%;
        max-width: 12%;
    }
</style>