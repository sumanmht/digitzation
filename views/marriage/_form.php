<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\District;
use app\models\Education;
use app\models\Registrar;
use yii\helpers\ArrayHelper;
use app\models\MotherTongue;
use app\models\Religion;

/** @var yii\web\View $this */
/** @var app\models\Marriage $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card">
    <div class="card-body">
        <div class="marriage-form">

            <?php $form = ActiveForm::begin([

                'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:12px;', 'class' => 'nepali'],
                'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
            ]); ?>
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
                            <?= $form->field($model, 'reg_year')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता साल'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_month')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता महिना'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता गते'])->label(' ')  ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="form-heading">विवाह मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'marriage_year')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता साल'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'marriage_month')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता महिना'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'marriage_day')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता गते'])->label(' ')  ?>
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
            <label>दुलहाको विवरण</label>
            <div class="form-group row nepalify">
                <div class="col-sm-4">
                    <div class="form-heading">दुलहाको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">शैक्षिक योग्यता</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'g_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्गता'])->label(' ')->dropdownList(
                                ArrayHelper::map(Education::find()->all(), 'level', 'level'),
                                [
                                    'prompt' => 'शैक्षिक योग्यता',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">मातृ भाषा</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'g_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                                ArrayHelper::map(MotherTongue::find()->all(), 'mother_tongue', 'mother_tongue'),
                                [
                                    'prompt' => 'मातृभाषा',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">धर्म</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'g_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                                ArrayHelper::map(Religion::find()->all(), 'religion', 'religion'),
                                [
                                    'prompt' => 'धर्म',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">वैवाहिक स्थिति</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'g_prev_marital_status')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकता नं.</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'g_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जारी जिल्ला</div>
                    <div class="row">
                        <div class="">
                            <?= $form->field($model, 'g_ctz_district')->label(' ')->dropdownList(
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
                    <div class="form-heading">जन्मथान</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'g_place_of_birth')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मस्थान'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">स्थायी ठेगाना</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'g_permanent_address')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label('') ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- <label>बाजेको विवरण</label> -->
            <div class="row form-group">
                <div class="col-sm-4">
                    <div class="form-heading">बाजेको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_grand_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'grandfather_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_grand_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'grandfather_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_grand_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'grandfather_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-heading">बाबुको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_father_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'father_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_father_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'father_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_father_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'father_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <label>दुलहीको विवरण</label>
            <div class="form-group row nepalify">
                <div class="col-sm-4">
                    <div class="form-heading">दुलहीको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">शैक्षिक योग्यता</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'b_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्गता'])->label(' ')->dropdownList(
                                ArrayHelper::map(Education::find()->all(), 'level', 'level'),
                                [
                                    'prompt' => 'शैक्षिक योग्यता',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">मातृ भाषा</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'b_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                                ArrayHelper::map(MotherTongue::find()->all(), 'mother_tongue', 'mother_tongue'),
                                [
                                    'prompt' => 'मातृभाषा',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">धर्म</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'b_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                                ArrayHelper::map(Religion::find()->all(), 'religion', 'religion'),
                                [
                                    'prompt' => 'धर्म',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">वैवाहिक स्थिति</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'b_prev_marital_status')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकता नं.</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'b_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जारी जिल्ला</div>
                    <div class="row">
                        <div class="">
                            <?= $form->field($model, 'b_ctz_district')->label(' ')->dropdownList(
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
                    <div class="form-heading">जन्मथान</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'b_place_of_birth')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मस्थान'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">स्थायी ठेगाना</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'b_permanent_address')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label('') ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- <label>बाजेको विवरण</label> -->
            <div class="row form-group">
                <div class="col-sm-4">
                    <div class="form-heading">बाजेको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_grand_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'grandfather_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_grand_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'grandfather_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_grand_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'grandfather_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-heading">बाबुको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_father_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'father_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_father_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'father_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_father_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'father_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <label>सूचकको विवरण</label>
            <div class="row form-group">
                <div class="row form-check">
                    <div class="form-check-inline ">
                        <label>दुलहा
                            <input class="form-check-input" type="checkbox" name="radiobtn" id="groom-checkbox">
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label>दुलही
                            <input class="form-check-input" type="checkbox" name="radiobtn" id="brider-checkbox" s>
                        </label>
                    </div>
                </div>
                <hr>
            </div>
            <label>स्क्यान गरिएको फोटो अपलोड गर्नुहोस</label>
            <div class="row ">
                <div class="col-sm-12">
                    <?= $form->field($model, 'ma_scanned_image')->fileInput(['id' => 'mafileInput'])->label('') ?>
                    <!-- Display the uploaded image file name -->
                    <?= $model->ma_scanned_image ?></p>

                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>