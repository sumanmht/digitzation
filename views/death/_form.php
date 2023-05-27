<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\District;
use app\models\Gender;
use app\models\Helper;
use app\models\Education;
use app\models\Religion;
use app\models\MotherTongue;
use app\models\Registrar;

/** @var yii\web\View $this */
/** @var app\models\Birth $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="card">
    <?php $form = ActiveForm::begin([

        'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:12px;', 'class' => 'nepali'],
        'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
    ]); ?>
    <div class="card-body">
        <div class="birth-form">
            <hr>
            <label>दर्ता विवरण</label>
            <div class="row form-group">
                <div class="col-sm-3">
                    <div class="form-heading">ठेगाना</div>
                    <div class="row">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'district')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm disabled', 'placeholder' => 'जिल्ला', 'value' => 'चितवन'])->label(' ') ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $form->field($model, 'local_level')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गा.वि.स/नगरपालिका', 'value' => 'रत्‍ननगर'])->label(' ') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'ward')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'वडा नं'])->label(' ') ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="row">
                        <div class="form-heading">दर्ता नं.</div>
                        <?= $form->field($model, 'reg_no')->input('integer', ['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता नं.'])->label(' ') ?>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_year')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_month')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label(' ')  ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="form-heading">मृत्यु मिति</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'death_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'death_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'death_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label(' ') ?>
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
            <label>मृतकको विवरण</label>
            <div class="form-group row">
                <div class="col-sm-4">
                    <div class="form-heading">मृतकको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'birth_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'birth_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'birth_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label(' ') ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-heading">लिङ्ग</div>
                    <div class="row">
                        <?= $form->field($model, 'gender')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'लिङ्ग'])->label(' ')->dropdownList(
                            ArrayHelper::map(Gender::find()->all(), 'gender', 'gender'),
                            [
                                'prompt' => 'लिङ्ग',
                                'class' => 'form-control form-control-sm'
                            ]
                        ) ?>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-heading">वैवाहिक स्थिति</div>
                    <div class="row">
                        <?= $form->field($model, 'marital_status')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => ''])->label(' ') ?>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">धर्म</div>
                    <div class="row">
                        <?= $form->field($model, 'religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                            ArrayHelper::map(Religion::find()->all(), 'religion', 'religion'),
                            [
                                'prompt' => 'धर्म',
                                'class' => 'form-control form-control-sm'
                            ]
                        ) ?>

                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">मातृ भाषा</div>
                    <div class="row">
                        <?= $form->field($model, 'mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                            ArrayHelper::map(MotherTongue::find()->all(), 'mother_tongue', 'mother_tongue'),
                            [
                                'prompt' => 'मातृभाषा',
                                'class' => 'form-control form-control-sm'
                            ]
                        ) ?>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकताको नं.</div>
                    <div class="row nepalify">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.', 'id' => 'father_ctz_no'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ctz_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'father_ctz_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ctz_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'father_ctz_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ctz_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'father_ctz_day'])->label(' ') ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जारी जिल्ला</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'ctz_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                [
                                    'prompt' => 'जिल्ला',
                                    'class' => 'form-control form-control-sm',
                                    'id' => 'father_ctz_district'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">Permanent address</div>
                    <div class="row">
                        <?= $form->field($model, 'permanent_address')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label(' ') ?>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-heading">मृत्यु भएको स्थान</div>
                    <div class="row">
                        <div>
                            <?= $form->field($model, 'place_of_death')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ') ?>
                        </div>
                    </div>
                </div>

            </div>
            <hr>

            <div class="row form-group">
                <div class="col-sm-4">
                    <label>बाजेको नाम</label>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grand_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'grandfather_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grand_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'grandfather_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grand_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'grandfather_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label>बाबुको नाम</label>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'father_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'father_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'father_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label>पति/पत्‍नीको नाम</label>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'father_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'father_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'father_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr>


            <label>सूचकको विवरण</label>
            <div class="row form-check">
                <div class="form-check-inline ">
                    <label>बाबु
                        <input class="form-check-input" type="radio" name="radiobtn" id="father-checkbox">
                    </label>
                </div>
                <div class="form-check-inline ">
                    <label>पति/पत्‍नी
                        <input class="form-check-input" type="radio" name="radiobtn" id="mother-checkbox">
                    </label>
                </div>
                <div class="form-check-inline">
                    <label>बाजे
                        <input class="form-check-input" type="radio" name="radiobtn" id="grandfather-checkbox" s>
                    </label>
                </div>
            </div>
            <div class="row form-group" id="informant">
                <div class="col-sm-4">
                    <div class="form-heading">सूचकको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'informant_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'informant_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'informant_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">नाता</div>
                    <div class="row nepalify">

                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-heading">नागरिकता नं.</div>
                            <div class="row">
                                <?= $form->field($model, 'inf_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.', 'id' => 'inf_ctz_no'])->label(' ') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-heading">जारी मिति</div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'inf_ctz_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'inf_ctz_year'])->label(' ') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'inf_ctz_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'inf_ctz_month'])->label(' ') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'inf_ctz_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'inf_ctz_day'])->label(' ') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-heading">जारी जिल्ला</div>
                            <div class="row">
                                <?= $form->field($model, 'inf_ctz_district')->dropdownList(
                                    ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                    [
                                        'prompt' => 'जिल्ला',
                                        'class' => 'form-control form-control-sm',
                                        'id' => 'inf_ctz_district'
                                    ]
                                )->label(' ') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <label>स्क्यान गरिएको फोटो अपलोड गर्नुहोस</label>
            <div class="row form-group">
                <div class="col-sm-12">
                    <?= $form->field($model, 'd_scanned_image')->fileInput(['id' => 'dfileInput'])->label('') ?>
                    <!-- Display the uploaded image file name -->
                    <?= $model->d_scanned_image ?></p>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>