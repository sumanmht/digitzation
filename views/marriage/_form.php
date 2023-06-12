<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\District;
use app\models\Education;
use app\models\Registrar;
use yii\helpers\ArrayHelper;
use app\models\MotherTongue;
use app\models\Religion;
use app\models\Ward;
use app\models\Municipality;

/** @var yii\web\View $this */
/** @var app\models\Marriage $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php

$this->registerJsFile('@web/js/marriage/marriageBsToAd.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/marriage/marriagecheck.js', ['depends' => 'yii\web\JqueryAsset']);
?>
<div class="card">
    <?php $form = ActiveForm::begin([

        'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:12px;'],
        'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
    ]); ?>
    <div class="card-body">
        <div class="marriage-form">
            <hr>
            <label>दर्ता विवरण</label>
            <div class="row form-group">
                <div class="col-sm-3">
                    <div class="form-heading">ठेगाना</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'district')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जिल्ला'])->label(' ')
                                ->dropdownList(
                                    ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                    [
                                        'prompt' => 'जिल्ला',
                                        'value' => 'चितवन',
                                        'class' => 'form-control form-control-sm'
                                    ]
                                ) ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $form->field($model, 'local_level')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गा.वि.स/नगरपालिका'])->label(' ')
                                ->dropdownList(
                                    ArrayHelper::map(Municipality::find()->all(), 'name', 'name'),
                                    [
                                        'prompt' => 'गा.पा/न.पा.',
                                        'value' => 'रत्ननगर',
                                        'class' => 'form-control form-control-sm'
                                    ]
                                ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'ward')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'वडा नं'])->label(' ')
                                ->dropdownList(
                                    ArrayHelper::map(Ward::find()->all(), 'number', 'number'),
                                    [
                                        'prompt' => 'वडा नं.',
                                        'class' => 'form-control form-control-sm'
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
                            <?= $form->field($model, 'reg_year')->textInput(['onchange' => 'regAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_month')->textInput(['onchange' => 'regAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->textInput(['onchange' => 'regAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_reg_day'])->label(' ')  ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">दर्ता मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_reg_day'])->label(' ')  ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">विवाह मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'marriage_year')->textInput(['onchange' => 'marriageAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_marriage_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'marriage_month')->textInput(['onchange' => 'marriageAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_marriage_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'marriage_day')->textInput(['onchange' => 'marriageAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_marriage_day'])->label(' ')  ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">विवाह मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_marriage_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_marriage_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_marriage_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_marriage_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_marriage_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_marriage_day'])->label(' ')  ?>
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
            <div class="row form-group">
                <div class="col-sm-6 nepalify">
                    <div class="form-heading">दुलहाको नाम(नेपालीमा)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'gFname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'gMname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'gLname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-heading">दुलहाको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name', 'id' => 'gFnameEng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name', 'id' => 'gMnameEng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'groom_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name', 'id' => 'gLnameEng'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row ">
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_year')->textInput(['onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_g_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_month')->textInput(['onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_g_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_day')->textInput(['onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_g_birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">जन्म मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_birth_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_g_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_birth_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_g_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_birth_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_g_birth_day'])->label(' ') ?>
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
                            <?= $form->field($model, 'g_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')
                                ->dropdownList(
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
                            <?= $form->field($model, 'g_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.', 'id' => 'gCtz'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_year')->textInput(['onchange' => 'gCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_g_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_month')->textInput(['onchange' => 'gCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_g_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_day')->textInput(['onchange' => 'gCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_g_ctz_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">जारी मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_g_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_g_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_g_ctz_day'])->label('') ?>
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
                                    'id' => 'groom_ctz_district'
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
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(नेपालीमा)</div>
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
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_grand_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'grandfather_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_grand_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'grandfather_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_grand_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'grandfather_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(नेपालीमा)</div>
                    <div class="row">
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
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(In English)</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_father_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'father_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_father_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'father_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_father_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'father_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <label>दुलहीको विवरण</label>
            <div class="form-group row ">
                <div class="col-sm-6">
                    <div class="form-heading">दुलहीको नाम(नेपालीमा)</div>
                    <div class="row nepalify">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'bFname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'bMname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'bLname'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-heading">दुलहीको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'bFnameEng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'bMnameEng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'bride_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'bLnameEng'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_year')->textInput(['onchange' => 'bBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_b_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_month')->textInput(['onchange' => 'bBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_b_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_day')->textInput(['onchange' => 'bBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_b_birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_b_birth_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_b_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_b_birth_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_b_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_b_birth_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_b_birth_day'])->label(' ') ?>
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
                            <?= $form->field($model, 'b_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.', 'id' => 'bCtz'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_year')->textInput(['onchange' => 'bCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_b_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_month')->textInput(['onchange' => 'bCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_b_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_day')->textInput(['onchange' => 'bCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_b_ctz_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden">
                    <div class="form-heading">जारी मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_b_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_b_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_b_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_b_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_b_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_b_ctz_day'])->label('') ?>
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
                                    'id' => 'bCtzD',
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
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(नेपालीमा)</div>
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
                <div class="col-sm-6">
                    <div class="form-heading">बाजेको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_grand_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'grandfather_fname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_grand_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'grandfather_mname'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_grand_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'grandfather_lname'])->label(' ') ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(नेपालनीमा)</div>
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
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_father_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'father_fname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_father_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'father_mname_eng'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_father_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'father_lname_eng'])->label(' ') ?>
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
                            <input class="form-check-input" type="checkbox" name="radiobtn" id="bride-checkbox" s>
                        </label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-group hidden" id="inf1">
                <label>दुलहा</label>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-heading">नाम</div>
                        <div class=" row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf1_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm',  'id' => 'inf1Fname', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf1_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1Mname', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf1_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1Lname', 'placeholder' => 'थर'])->label(' ') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-heading">नागरकिता विवरण</div>
                        <div class="row">
                            <div class="col-sm-3">
                                <?= $form->field($model, 'inf1_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm',  'id' => 'inf1_ctz_no', 'placeholder' => 'नागरिकता नं.'])->label(' ') ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($model, 'inf1_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1_ctz_year', 'placeholder' => 'जारी साल'])->label(' ') ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($model, 'inf1_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1_ctz_month', 'placeholder' => 'जारी महिना'])->label(' ') ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($model, 'inf1_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1_ctz_day', 'placeholder' => 'जारी गते'])->label(' ') ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($model, 'inf1_ctz_district')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1_ctz_district', 'placeholder' => 'जारी भएको जिल्ला'])->label(' ') ?>
                            </div>
                        </div>
                        <div class="hide row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf1_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm',  'id' => 'inf1FnameEng'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf1_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1MnameEng'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf1_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf1LnameEng'])->label(' ') ?>
                            </div>
                        </div>
                        <div class="hide row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'ad_inf1_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'ad_inf1_ctz_year'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'ad_inf1_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'ad_inf1_ctz_month'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'ad_inf1_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'ad_inf1_ctz_day'])->label(' ') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group hidden" id="inf2">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-heading">दुलही</div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf2_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm',  'id' => 'inf2Fname', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf2_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2Mname', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf2_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2Lname', 'placeholder' => 'थर'])->label(' ') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-heading">नागरिकता विवरण</div>
                        <div class="row">
                            <div class="col-sm-3">
                                <?= $form->field($model, 'inf2_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm',  'id' => 'inf2_ctz_no', 'placeholder' => 'नागरिकता नं.'])->label(' ') ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($model, 'inf2_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2_ctz_year', 'placeholder' => 'जारी साल'])->label(' ') ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($model, 'inf2_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2_ctz_month', 'placeholder' => 'जारी महिना'])->label(' ') ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($model, 'inf2_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2_ctz_day', 'placeholder' => 'जारी गते'])->label(' ') ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($model, 'inf2_ctz_district')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2_ctz_district', 'placeholder' => 'जारी भएको जिल्ला'])->label(' ') ?>
                            </div>
                        </div>
                        <div class="hide row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf2_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm',  'id' => 'inf2FnameEng'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf2_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2MnameEng'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'inf2_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'inf2LnameEng'])->label(' ') ?>
                            </div>
                        </div>
                        <div class="hide row">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'ad_inf2_ctz_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'ad_inf2_ctz_year'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'ad_inf2_ctz_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'ad_inf2_ctz_month'])->label(' ') ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'ad_inf2_ctz_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'id' => 'ad_inf2_ctz_day'])->label(' ') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <label>स्क्यान गरिएको फोटो अपलोड गर्नुहोस</label>
            <div class="row form-group">
                <div class="col-sm-12">
                    <?= $form->field($model, 'ma_scanned_image')->fileInput(['id' => 'mafileInput'])->label('') ?>
                    <!-- Display the uploaded image file name -->
                    <?= $model->ma_scanned_image ?></p>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group">
            <div class="row">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<style type="text/css">
    .hide {
        display: none;
    }
</style>