<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\District;
use app\models\Gender;
use app\models\BirthPlace;
use app\models\BirthType;
use app\models\Helper;
use app\models\Education;
use app\models\Religion;
use app\models\MotherTongue;
use app\models\Registrar;
use app\models\Ward;
use app\models\Municipality;

/** @var yii\web\View $this */
/** @var app\models\Birth $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php
$this->registerJsFile('@web/js/birth/birth.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/birth/birthradio.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/birth/birthBsToAd.js', ['depends' => 'yii\web\JqueryAsset']);
?>
<div class="card">
    <div class="card-body">
        <div class="birth-form">

            <?php $form = ActiveForm::begin([

                'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:12px;', 'class' => 'nepali', 'id' => 'birth-form'],
                'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
            ]); ?>

            <label>दर्ता विवरण</label>
            <div class="row form-group">
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता भएको ठेगाना</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'p_district')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm '])->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                [
                                    'prompt' => 'जिल्ला',
                                    'value' => 'चितवन',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $form->field($model, 'p_muni')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label(' ')->dropdownList(
                                ArrayHelper::map(Municipality::find()->all(), 'name', 'name'),
                                [
                                    'prompt' => 'गा.पा/न.पा.',
                                    'value' => 'रत्ननगर',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'p_ward')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'वडा नं'])->label(' ')->dropdownList(
                                ArrayHelper::map(Ward::find()->all(), 'number', 'number'),
                                [
                                    'prompt' => 'वडा',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="row">
                        <div class="form-heading">दर्ता नं.</div>
                        <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify required nn', 'placeholder' => 'दर्ता नं.'])->label(' ') ?>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4 b_reg_year">
                            <?= $form->field($model, 'reg_year')->textInput(['onchange' => 'regAd()', 'maxlength' => 4, 'class' => 'form-control form-control-sm ', 'placeholder' => 'साल', 'id' => 'b_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'reg_month')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'महिना', 'id' => 'b_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'गते', 'id' => 'b_reg_day'])->label(' ') ?>
                        </div>
                        <div class="error-message"></div>

                    </div>

                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">दर्ता मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4 ad_reg_year">
                            <?= $form->field($model, 'ad_reg_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'ad_reg_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'महिना', 'id' => 'ad_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm day', 'placeholder' => 'गते', 'id' => 'ad_reg_day'])->label(' ') ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-2">
                    <div class="form-heading">विवाह भएको साल</div>
                    <div class="row ">
                        <div class="col-sm-12 b_married_year">
                            <?= $form->field($model, 'married_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'विवाह भएको साल', 'id' => 'b_married_year'])->label(' ') ?>
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
            <label>नवजात शिशुको विवरण</label>
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="form-heading">शिशुको नाम(नेपालीमा)</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'थर'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-heading">शिशुको नाम(English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'surname'])->label(' ') ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4 b_birth_year ">
                            <?= $form->field($model, 'birth_year')->textInput(['onchange' => 'birthAd()', 'maxlength' => 4, 'class' => 'form-control form-control-sm ', 'placeholder' => 'साल', 'id' => 'b_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'birth_month')->textInput(['onchange' => 'birthAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'महिना', 'id' => 'b_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'birth_day')->textInput(['onchange' => 'birthAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'गते', 'id' => 'b_birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden ">
                    <div class="form-heading">जन्म मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4 ad_birth_year">
                            <?= $form->field($model, 'ad_birth_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm ', 'placeholder' => 'साल', 'id' => 'ad_birth_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'ad_birth_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_birth_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_birth_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm day ', 'placeholder' => 'गते', 'id' => 'ad_birth_day'])->label(' ') ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-1">
                    <div class="form-heading">लिङ्ग</div>
                    <div class="row">
                        <?= $form->field($model, 'gender')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'लिङ्ग'])->label(' ')
                            ->dropdownList(
                                ArrayHelper::map(Gender::find()->all(), 'gender', 'gender'),
                                [
                                    'placeholder' => 'लिङ्ग',
                                    'prompt' => '',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">जन्मको प्रकार</div>
                    <?= $form->field($model, 'birth_type')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'प्रकार'])->label(' ')->dropdownList(
                        ArrayHelper::map(BirthType::find()->all(), 'type', 'type'),
                        [
                            'prompt' => 'प्रकार',
                            'class' => 'form-control form-control-sm'
                        ]
                    )  ?>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जन्म दाता</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'helper')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मदा मद्दत गर्ने व्यक्ति'])->label(' ')->dropdownList(
                                ArrayHelper::map(Helper::find()->all(), 'helper', 'helper'),
                                [
                                    'prompt' => 'मद्दत गर्ने व्यक्ति',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">शिशु जन्मेको स्थान</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शिशुको जन्मेको स्थान'])->label(' ')->dropdownList(
                                ArrayHelper::map(BirthPlace::find()->all(), 'place', 'place'),
                                [
                                    'prompt' => 'जन्मस्थान',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जन्मेको देश</div>
                    <div class="row nepalify">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'bith_country')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मेको देश'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <label>बाजेको विवरण</label>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(नेपालीमा)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grandfather_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'पहिलो नाम', 'id' => 'grandfather_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grandfather_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'बीचको नाम', 'id' => 'grandfather_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grandfather_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'थर', 'id' => 'grandfather_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grandfather_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'grandfather_fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grandfather_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'grandfather_mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grandfather_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Surname', 'id' => 'grandfather_lname_eng'])->label(' ') ?>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <label>बाबुको विवरण</label>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(नेपालीमा)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'पहिलो नाम', 'id' => 'father_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'बीचको नाम', 'id' => 'father_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'थर', 'id' => 'father_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class=" form-heading">बाबुको नाम(English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'father_fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'father_mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Surname', 'id' => 'father_lname_eng'])->label(' ') ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकताको विवरण</div>
                    <div class="row">
                        <div class="col-sm-12 b_father_ctz_no">
                            <?= $form->field($model, 'father_ctz_no')->textInput(['maxlength' => 14, 'class' => 'form-control form-control-sm ', 'placeholder' => 'नागरिकता नं.', 'id' => 'b_father_ctz_no'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4 b_father_ctz_year">
                            <?= $form->field($model, 'father_ctz_year')->textInput(['onchange' => 'regAd()', 'maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'b_father_ctz_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_ctz_month')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'महिना', 'id' => 'b_father_ctz_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_ctz_day')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'b_father_ctz_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden">
                    <div class="form-heading">जारी मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_father_ctz_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm ', 'placeholder' => 'साल', 'id' => 'ad_father_ctz_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_father_ctz_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'महिना', 'id' => 'ad_father_ctz_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_father_ctz_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_father_ctz_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-heading">जारी जिल्ला</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'father_ctz_district')->label(' ')->dropdownList(
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
                    <div class="form-heading">स्थायी ठेगाना</div>
                    <div class="row nepalify">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'father_permanent_address')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">शैक्षिक योग्यता</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'father_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्गता'])->label(' ')->dropdownList(
                                ArrayHelper::map(Education::find()->all(), 'level', 'level'),
                                [
                                    'prompt' => 'शैक्षिक योग्यता',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-heading">मातृ भाषा</div>
                            <?= $form->field($model, 'father_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                                ArrayHelper::map(MotherTongue::find()->all(), 'mother_tongue', 'mother_tongue'),
                                [
                                    'prompt' => 'मातृभाषा',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-heading">धर्म</div>
                            <?= $form->field($model, 'father_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                                ArrayHelper::map(Religion::find()->all(), 'religion', 'religion'),
                                [
                                    'prompt' => 'धर्म',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">बाबुबाट जन्मेको शिशुको सङ्ख्या</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'father_birth_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मेको शिशुको सङ्ख्या'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">बाबुबाट जन्मेको शिशुको जिवित सङ्ख्या</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'father_living_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जिवित शिशुको सङ्ख्या'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <label>आमाको विवरण</label>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">आमाको नाम(नेपालीमा)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mother_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'पहिलो नाम', 'id' => 'mother_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mother_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'बीचको नाम', 'id' => 'mother_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mother_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'थर', 'id' => 'mother_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-heading">आमाको नाम(English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mother_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'mother_fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mother_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'mother_mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mother_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Surname', 'id' => 'mother_lname_eng'])->label(' ') ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकताको विवरण</div>
                    <div class="row">
                        <div class="col-sm-12 b_mother_ctz_no">
                            <?= $form->field($model, 'mother_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm  b_mother_ctz_no', 'placeholder' => 'नागरिकता नं.', 'id' => 'b_mother_ctz_no'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4 b_mother_ctz_year">
                            <?= $form->field($model, 'mother_ctz_year')->textInput(['onchange' => 'motherAd()', 'maxlength' => 4, 'class' => 'form-control form-control-sm ', 'placeholder' => 'साल', 'id' => 'b_mother_ctz_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'mother_ctz_month')->textInput(['onchange' => 'motherAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'b_mother_ctz_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mother_ctz_day')->textInput(['onchange' => 'motherAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'b_mother_ctz_day'])->label(' ') ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 hidden">
                    <div class="form-heading">दर्ता मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'ad_mother_ctz_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_mother_ctz_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'ad_mother_ctz_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_mother_ctz_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_mother_ctz_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm day', 'placeholder' => 'गते', 'id' => 'ad_mother_ctz_day'])->label(' ') ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जारी जिल्ला</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'mother_ctz_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                [
                                    'prompt' => 'जिल्ला',
                                    'class' => 'form-control form-control-sm',
                                    'id' => 'mother_ctz_district'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>


                <div class="col-sm-2">
                    <div class="form-heading">स्थायी ठेगाना</div>
                    <div class="row nepalify">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'mother_permanent_address')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">शैक्षिक योग्यता</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'mother_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्गता'])->label(' ')->dropdownList(
                                ArrayHelper::map(Education::find()->all(), 'level', 'level'),
                                [
                                    'prompt' => 'शैक्षिक योग्यता',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-heading">मातृ भाषा</div>
                            <?= $form->field($model, 'mother_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                                ArrayHelper::map(MotherTongue::find()->all(), 'mother_tongue', 'mother_tongue'),
                                [
                                    'prompt' => 'मातृभाषा',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-heading">धर्म</div>
                            <?= $form->field($model, 'mother_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                                ArrayHelper::map(Religion::find()->all(), 'religion', 'religion'),
                                [
                                    'prompt' => 'धर्म',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">आमाबाट जन्मेको शिशुको सङ्ख्या</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'mother_birth_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मेको शिशुको सङ्ख्या'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">आमाबाट जन्मेको शिशुको जिवित सङ्ख्या</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'mother_living_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जिवित शिशुको सङ्ख्या'])->label(' ') ?>
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
                    <label>आमा
                        <input class="form-check-input" type="radio" name="radiobtn" id="mother-checkbox">
                    </label>
                </div>
                <div class="form-check-inline">
                    <label>बाजे
                        <input class="form-check-input" type="radio" name="radiobtn" id="grandfather-checkbox" s>
                    </label>
                </div>
            </div>
            <div class="inf">
                <div class="row form-group" id="informant" style="display:flex;">
                    <div class="col-sm-4 c4" style="flex-grow: 1; flex-shrink: 0; margin-right: 1px;">
                        <div class="form-heading">सूचकको नाम(नेपालीमा)</div>
                        <div class="row nepalify ">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'informant_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'पहिलो नाम', 'id' => 'inf_fname'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'informant_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'बीचको नाम', 'id' => 'inf_mname'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'informant_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'थर', 'id' => 'inf_lname'])->label(' ') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 c4" style="flex-grow: 1; flex-shrink: 0; margin-right: 2px;">
                        <div class="form-heading">सूचकको नाम(English)</div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'inf_fname_eng'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'inf_mname_eng'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name', 'id' => 'inf_lname_eng'])->label(' ') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 2px;">
                        <div class="form-heading">नाता</div>
                        <div class="row nepalify">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'relation')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शिशुसँगको नाता', 'id' => 'relation'])->label(' ') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 c6" style="flex-grow: 1; flex-shrink: 0; margin-right:0px;">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-heading">नागरिकता नं.</div>
                                <div class="row b_inf_ctz_no">
                                    <?= $form->field($model, 'inf_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm b_inf_ctz_no', 'placeholder' => 'नागरिकता नं.', 'id' => 'b_inf_ctz_no'])->label(' ') ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-heading">जारी मिति</div>
                                <div class="row">
                                    <div class="col-sm-4 b_inf_ctz_year">
                                        <?= $form->field($model, 'inf_ctz_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm b_inf_ctz_year', 'placeholder' => 'साल', 'id' => 'b_inf_ctz_year'])->label(' ')->error(['class' => 'highlight-empty', 'enableAjaxValidation' => true, 'validateOnChange' => false, 'validateOnBlur' => false]) ?>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <?= $form->field($model, 'inf_ctz_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'b_inf_ctz_month'])->label(' ') ?>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <?= $form->field($model, 'inf_ctz_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'b_inf_ctz_day'])->label(' ') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden">
                                <div class="form-heading">जारी मिति</div>
                                <div class="row">
                                    <div class="col-sm-4 ">
                                        <?= $form->field($model, 'ad_inf_ctz_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm b_inf_ctz_year', 'placeholder' => 'साल', 'id' => 'ad_inf_ctz_year'])->label(' ') ?>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <?= $form->field($model, 'ad_inf_ctz_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_inf_ctz_month'])->label(' ') ?>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <?= $form->field($model, 'ad_inf_ctz_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_inf_ctz_day'])->label(' ') ?>
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
            </div>
            <hr>

            <label>स्क्यान गरिएको फोटो अपलोड गर्नुहोस</label>
            <div class="row ">

                <?= $form->field($model, 'scanned_image')->fileInput(['id' => 'fileInput'])->label('') ?>
                <!-- Display the uploaded image file name -->
                <?= $model->scanned_image ?></p>

            </div>
        </div>

    </div>
    <div class="card-footer form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<!-- 
<style type="text/css">
    .nn:not(:focus) {
        /* Change the color of the form field that is required but not entered */
        border-color: red;
    }
</style> -->
<style type="text/css">
    .c2 {
        flex-basis: 10%;
        max-width: 10%;
    }

    .c4 {
        flex-basis: 25%;
        max-width: 25%;
    }

    .c6 {
        flex-basis: 35%;
        max-width: 40%;
    }

    .hidden {
        display: none;
    }
</style>