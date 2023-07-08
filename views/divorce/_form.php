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
/** @var app\models\Divorce $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card">
    <div class="card-body">
        <div class="divorce-form">
            <?php $form = ActiveForm::begin([

                'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:0.8em;',  'id' => 'birth-form'],
                'fieldConfig' => ['labelOptions' => ['class' => 'control-label horizontal'],]
            ]); ?>

            <label>दर्ता विवरण</label>
            <div class="form-group form-row">
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता भएको ठेगाना</div>
                    <div class="form-group form-row">
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'district')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label(' ')
                                ->dropdownList(
                                    ArrayHelper::map(District::find()->all(), 'id', 'name'),
                                    [
                                        'prompt' => 'जिल्ला',
                                        //'id' => 'hey',
                                        'class' => '',
                                        'onchange' => '$.post("index.php?r=divorce/municipality&id=" + $(this).val(), function(data) {
                                            $("select#divorce-local_level").html(data);
                                            
                                        });',
                                        //'onchange' => '$("#divorce-local_level").prop("disabled", false);'

                                    ]
                                ) ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $form->field($model, 'local_level')->textInput(['maxlength' => true, 'class' => ' '])->label(' ')
                                ->dropdownList(
                                    ArrayHelper::map(Municipality::find()->all(), 'id', 'name'),
                                    [

                                        'prompt' => 'गा.पा/न.पा',
                                        //'id' => 'dis',
                                        //'disabled' => true,
                                        'class' => '',
                                        'onchange' => '$.post("index.php?r=divorce/ward&id=" + $(this).val(), function(data) {
                                            $("select#divorce-ward").html(data);
                                        });',
                                    ]
                                ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'ward')->textInput(['maxlength' => true, 'class' => '', 'placeholder' => 'वडा नं'])
                                ->dropdownList(
                                    ArrayHelper::map(Ward::find()->all(), 'id', 'number'),
                                    [
                                        'prompt' => 'वडा नं.',
                                        ///'id' => 'ward',
                                        //'disabled' => true,
                                        'class' => ''
                                    ]
                                ) ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-row">
                        <div class="form-heading">दर्ता नं.</div>
                        <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'class' => ' nepalify required nn', 'placeholder' => 'दर्ता नं.'])->label(' ') ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(वि.स.)</div>
                    <div class="form-row">
                        <div class="col-sm-4 b_reg_year">
                            <?= $form->field($model, 'reg_year')->textInput(['onchange' => 'regAd()', 'maxlength' => 4, 'class' => ' ', 'placeholder' => 'साल', 'id' => 'b_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'reg_month')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => '', 'placeholder' => 'महिना', 'id' => 'b_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => ' ', 'placeholder' => 'गते', 'id' => 'b_reg_day'])->label(' ') ?>
                        </div>
                        <div class="error-message"></div>
                    </div>
                </div>

                <div class="col-sm-3 ">
                    <div class="form-heading">दर्ता मिति(ई.स.)</div>
                    <div class="form-row">
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
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(वि.स.)</div>
                    <div class="form-row">
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'marriage_year')->textInput(['onchange' => 'regAd()', 'maxlength' => 4, 'class' => 'form-control form-control-sm ', 'placeholder' => 'साल', 'id' => 'b_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'marriage_month')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'महिना', 'id' => 'b_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'marriage_day')->textInput(['onchange' => 'regAd()', 'maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'गते', 'id' => 'b_reg_day'])->label(' ') ?>
                        </div>
                        <div class="error-message"></div>
                    </div>
                </div>

                <div class="col-sm-3 ">
                    <div class="form-heading">दर्ता मिति(ई.स.)</div>
                    <div class="form-row">
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'ad_marriage_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4 ">
                            <?= $form->field($model, 'ad_marriage_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm ', 'placeholder' => 'महिना', 'id' => 'ad_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_marriage_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm day', 'placeholder' => 'गते', 'id' => 'ad_reg_day'])->label(' ') ?>
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

            <label>सम्बन्ध विच्छेद ठहर गर्नेको विवरण</label>
            <div class="form-row form-group">
                <div class="col-sm-2">
                    <div class="form-heading">अदालतको प्रकार</div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'court_type')->textInput(['class' => 'form-control form-control-sm',])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">अदालतको नाम</div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'court_name')->textInput(['class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">अदालतको ठेगाना</div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'court_address')->textInput(['class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">निर्णय नं.</div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'decision_number')->textInput(['class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">निर्णय मिति(वि.स.)</div>
                    <div class="form-row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'decison_year')->textInput(['maxlength' => 4, 'onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_g_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'decison_month')->textInput(['maxlength' => 2, 'onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_g_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'decision_day')->textInput(['maxlength' => 2, 'onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_g_birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 ">
                    <div class="form-heading">निर्णय मिति(ई.स.)</div>
                    <div class="form-row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_decison_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_g_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_decison_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_g_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_decision_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_g_birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">विवाह दर्ता नं.</div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'marriage_reg_no')->textInput(['class' => 'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
            <label>दुलहाको विवरण</label>
            <div class="row form-group">
                <div class="col-sm-6 neptrad">
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
                            <?= $form->field($model, 'g_birth_year')->textInput(['maxlength' => 4, 'onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_g_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_month')->textInput(['maxlength' => 2, 'onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_g_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_birth_day')->textInput(['maxlength' => 2, 'onchange' => 'gBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_g_birth_day'])->label(' ') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 ">
                    <div class="form-heading">जन्म मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_birth_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'ad_m_g_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_birth_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'ad_m_g_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_g_birth_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'ad_m_g_birth_day'])->label(' ') ?>
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
                            <?= $form->field($model, 'g_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm gCtz', 'placeholder' => 'नागरिकता नं.', 'id' => 'gCtz'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_year')->textInput(['maxlength' => 4, 'onchange' => 'gCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_g_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_month')->textInput(['maxlength' => 2, 'onchange' => 'gCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_g_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'g_ctz_day')->textInput(['maxlength' => 2, 'onchange' => 'gCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_g_ctz_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 ">
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
                <div class="col-sm-6">
                    <div class="form-heading">बाबुको नाम(In English)</div>
                    <div class="row">
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
                            <?= $form->field($model, 'b_birth_year')->textInput(['maxlength' => 4, 'onchange' => 'bBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_b_birth_year'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_month')->textInput(['maxlength' => 2, 'onchange' => 'bBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_b_birth_month'])->label(' ') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_birth_day')->textInput(['maxlength' => 2, 'onchange' => 'bBirthAd()', 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_b_birth_day'])->label(' ') ?>
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
                            <?= $form->field($model, 'b_ctz_year')->textInput(['maxlength' => 4, 'onchange' => 'bCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'm_b_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_month')->textInput(['maxlength' => 2, 'onchange' => 'bCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'm_b_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'b_ctz_day')->textInput(['maxlength' => 2, 'onchange' => 'bCtzAd()', 'maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'm_b_ctz_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 ">
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
                    <label class="form-heading">बाबुको नाम(नेपालनीमा)</label>
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
                <div class="col-sm-6 ">
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
            <div class="row form-group">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'total_child')->textInput(['class' => 'form-controlform-control-sm'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'living_child')->textInput(['class' => 'form-controlform-control-sm'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'with_father')->textInput(['class' => 'form-controlform-control-sm'])->label('') ?>

                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'with_mother')->textInput(['class' => 'form-controlform-control-sm'])->label('') ?>
                        </div>
                    </div>
                </div>
            </div>

            <label>सूचकको विवरण</label>
            <div class="row form-check">
                <div class="form-check-inline ">
                    <label>पति
                        <input class="form-check-input" type="radio" name="radiobtn" id="d-husband-checkbox">
                    </label>
                </div>
                <div class="form-check-inline ">
                    <label>पत्‍नी
                        <input class="form-check-input" type="radio" name="radiobtn" id="d-wife-checkbox">
                    </label>
                </div>
            </div>

            <div class="row form-group" id="informant">
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-heading">सूचकको नाम(नेपालीमा)</div>
                            <div class="row">
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
                        <div class="col-sm-6">
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
                    </div>

                </div>
                <div class="col-sm-5 ">
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
                                <div class="col-sm-4">
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
                        <div class="col-sm-6">
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


        <?= $form->field($model, 'di_scanned_image')->fileInput(['id' => 'dfileInput'])->label('') ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
</div>
<!-- <script>
    $(document).ready(function() {
        $('#divorce-district').change(function() {
            var districtId = $(this).val();
            if (districtId !== "") {
                // Enable local_level dropdown
                $('#divorce-local_level').prop('disabled', false);

                // Clear and disable ward dropdown
                ///$('#divorce-ward').html('').prop('disabled', true);

                // Populate local_level dropdown based on the selected district
                $.post("index.php?r=divorce/municipality&id=" + districtId, function(data) {
                    $('#divorce-local_level').html(data);
                });
            } else {
                // Clear and disable local_level and ward dropdowns
                $('#divorce-local_level').html('').prop('disabled', true);
                //$('#ward-id').html('').prop('disabled', true);
            }
        });

        $('#divorce-local_level').change(function() {
            var localLevelId = $(this).val();
            if (localLevelId !== "") {
                // Enable ward dropdown
                $('#divorce-ward').prop('disabled', false);

                // Populate ward dropdown based on the selected local_level
                $.post("index.php?r=divorce/ward&id=" + localLevelId, function(data) {
                    $('#divorce-ward').html(data);
                });
            } else {
                // Clear and disable ward dropdown
                $('#divorce-ward').html('').prop('disabled', true);
            }
        });
    });
</script> -->