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
use app\models\Municipality;
use app\models\Registrar;
use app\models\Ward;

/** @var yii\web\View $this */
/** @var app\models\Birth $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php
$this->registerJsFile('@web/js/death/death.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/death/deathradio.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/death/deathBsToAd.js', ['depends' => 'yii\web\JqueryAsset']);
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
                            <?= $form->field($model, 'local_level')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गा.वि.स/नगरपालिका'])->label(' ')
                                ->dropdownList(
                                    ArrayHelper::map(Municipality::find()->all(), 'name', 'name'),
                                    [
                                        'prompt' => 'गा.पा/न.पा',
                                        'class' => 'form-control form-control-sm',
                                        'value' => 'रत्ननगर'
                                    ]
                                ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'ward')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'वडा नं'])->label(' ')
                                ->dropdownList(
                                    ArrayHelper::map(Ward::find()->all(), 'number', 'number'),
                                    [
                                        'prompt' => 'वडा नं.',
                                        'class' => 'form-control form-control-sm',
                                    ]
                                ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="row">
                        <div class="form-heading">दर्ता नं.</div>
                        <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता नं.'])->label(' ') ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_year')->textInput(['maxlength' => 4, 'onchange' => 'regAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_month')->textInput(['maxlength' => 2, 'onchange' => 'regAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->textInput(['maxlength' => 2, 'onchange' => 'regAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'reg_day'])->label(' ')  ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">दर्ता मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_reg_day'])->label(' ')  ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">मृत्यु मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'death_year')->textInput(['maxlength' => 4, 'onchange' => 'deathAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'death_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'death_month')->textInput(['maxlength' => 2, 'onchange' => 'deathAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'death_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'death_day')->textInput(['maxlength' => 2, 'onchange' => 'deathAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'death_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">मृत्यु मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_death_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_death_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_death_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_death_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_death_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_death_day'])->label(' ') ?>
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
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">मृतकको नाम</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-heading">मृतकको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name', 'id' => 'lname_eng'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'birth_year')->textInput(['maxlength' => 4, 'onchange' => 'birthAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'birth_month')->textInput(['maxlength' => 2, 'onchange' => 'birthAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'birth_day')->textInput(['maxlength' => 2, 'onchange' => 'birthAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden ">
                    <div class="form-heading">जन्म मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_birth_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_birth_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_birth_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">लिङ्ग</div>
                    <?= $form->field($model, 'gender')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'लिङ्ग'])->label(' ')->dropdownList(
                        ArrayHelper::map(Gender::find()->all(), 'gender', 'gender'),
                        [
                            'prompt' => 'लिङ्ग',
                            'class' => 'form-control form-control-sm'
                        ]
                    ) ?>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-heading">वैवाहिक स्थिति</div>
                            <?= $form->field($model, 'marital_status')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => ''])->label(' ') ?>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-heading">धर्म</div>
                            <?= $form->field($model, 'religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                                ArrayHelper::map(Religion::find()->all(), 'religion', 'religion'),
                                [
                                    'prompt' => 'धर्म',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-heading">मातृ भाषा</div>
                            <?= $form->field($model, 'mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                                ArrayHelper::map(MotherTongue::find()->all(), 'mother_tongue', 'mother_tongue'),
                                [
                                    'prompt' => 'मातृभाषा',
                                    'class' => 'form-control form-control-sm'
                                ]
                            ) ?>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-heading">स्थायी ठेगाना</div>
                            <?= $form->field($model, 'permanent_address')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label(' ') ?>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-heading">मृत्यु भएको स्थान</div>
                            <?= $form->field($model, 'place_of_death')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'मृत्यु भएको स्थान'])->label(' ') ?>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-heading">मृत्युको कारण</div>
                            <?= $form->field($model, 'reason_of_death')->textInput(['class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकताको नं.</div>
                    <div class="row nepalify">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.', 'id' => 'ctz_no'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ctz_year')->textInput(['maxlength' => 4, 'onchange' => 'CtzAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ctz_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ctz_month')->textInput(['maxlength' => 2, 'onchange' => 'CtzAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ctz_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ctz_day')->textInput(['maxlength' => 2, 'onchange' => 'CtzAd', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ctz_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden">
                    <div class="form-heading">जारी मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_ctz_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_ctz_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_ctz_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_ctz_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_ctz_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_ctz_day'])->label(' ') ?>
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
                                    'id' => 'ctz_district'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <label>अभिभावकको विवरण</label>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(नेपालीमा)</div>
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
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grand_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'grandfather_fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grand_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'grandfather_mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'grand_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name', 'id' => 'grandfather_lname_eng'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(नेपालीमा)</div>
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
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'first Name', 'id' => 'father_fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'father_mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'father_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name', 'id' => 'father_lname_eng'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">पति/पत्‍नीको नाम(नेपालीमा)</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'spouse_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'spouse_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'spouse_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-heading">पति/पत्‍नीको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'spouse_fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'spouse_mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'spouse_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name', 'id' => 'spouse_lname_eng'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <label>सूचकको विवरण</label>
            <div class="row form-check">
                <div class="form-check-inline ">
                    <label>बाबु
                        <input class="form-check-input" type="radio" name="radiobtn" id="d-father-checkbox">
                    </label>
                </div>
                <div class="form-check-inline ">
                    <label>पति/पत्‍नी
                        <input class="form-check-input" type="radio" name="radiobtn" id="d-spouse-checkbox">
                    </label>
                </div>
                <div class="form-check-inline">
                    <label>बाजे
                        <input class="form-check-input" type="radio" name="radiobtn" id="d-grandfather-checkbox" s>
                    </label>
                </div>
            </div>
            <div class="inf">
                <div class="row form-group" id="informant" style="display:flex;">
                    <div class="col-sm-4 c4" style="flex-grow: 1; flex-shrink: 0; margin-right: 1px;">
                        <div class="form-heading">सूचकको नाम(नेपालीमा)</div>
                        <div class="row nepalify ">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'पहिलो नाम', 'id' => 'inf_fname'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'बीचको नाम', 'id' => 'inf_mname'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm nepalify', 'placeholder' => 'थर', 'id' => 'inf_lname'])->label(' ') ?>
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
                                        <?= $form->field($model, 'inf_ctz_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm b_inf_ctz_year', 'placeholder' => 'साल', 'id' => 'b_inf_ctz_year'])->label(' ') ?>
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