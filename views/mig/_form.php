<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\District;
use yii\helpers\ArrayHelper;
use app\models\Registrar;
use app\models\Municipality;
use app\models\Ward;
use app\models\Gender;

/** @var yii\web\View $this */
/** @var app\models\Mig $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php
$this->registerJsFile('@web/js/migration/migBsToAd.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/migration/hidden.js', ['depends' => 'yii\web\JqueryAsset']);
//$this->registerJsFile('@web/js/birth/birthBsToAd.js', ['depends' => 'yii\web\JqueryAsset']);
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
                <div class="col-sm-3">
                    <div class="form-heading">ठेगाना</div>
                    <div class="row">
                        <div class="col-sm-4">
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
                    <div class="form-heading">दर्ता नं.</div>
                    <div class="row">
                        <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता नं.'])->label(' ') ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_year')->textInput(['onchange' => 'regAd', 'maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_month')->textInput(['onchange' => 'regAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'reg_day')->textInput(['onchange' => 'regAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'reg_day'])->label(' ')  ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">दर्ता मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'YYYY', 'id' => 'ad_reg_year'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'MM', 'id' => 'ad_reg_month'])->label(' ')  ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_reg_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'DD', 'id' => 'ad_reg_day'])->label(' ')  ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">बसाई सराई मिति(वि.स.)</div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'migration_year')->textInput(['onchange' => 'marriageAd', 'maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'migration_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'migration_month')->textInput(['onchange' => 'marriageAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'migration_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'migration_day')->textInput(['onchange' => 'marriageAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'migration_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">बसाई सराई मिति(ई.स.)</div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_migration_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'YYYY', 'id' => 'ad_migration_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_migration_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'MM', 'id' => 'ad_migration_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_migration_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'DD', 'id' => 'ad_migration_day'])->label('') ?>
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
                    <div class="form-heading">सूचकको नाम(नेपालीमा)</div>
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
                <div class="col-sm-6">
                    <div class="form-heading">सूचकको नाम(In English)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_fname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_mname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_lname_eng')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name'])->label('') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_birth_year')->textInput(['onchange' => 'InfBirthAd', 'maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'inf_birth_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_birth_month')->textInput(['onchange' => 'InfBirthAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'inf_birth_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_birth_day')->textInput(['onchange' => 'InfBirthAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'inf_birth_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जन्म मिति(ई.स.0</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_inf_birth_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'YYYY', 'id' => 'ad_inf_birth_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_inf_birth_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'MM', 'id' => 'ad_inf_birth_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_inf_birth_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'DD', 'id' => 'ad_inf_birth_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-heading">लिङ्ग</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_gender')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label('')
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
                </div>
                <div class="col-sm-2">
                    <div class="form-heading">जन्मस्थान</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_birth_place')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मस्थान'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading"></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'inf_occupation')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पेशा'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'inf_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'inf_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृभाषा'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'inf_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्यता'])->label('') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-heading">नागरिकता नं.</div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'inf_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी मिति(वि.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_ctz_year')->textInput(['onchange' => 'InfCtzAd', 'maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'inf_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_ctz_month')->textInput(['onchange' => 'InfCtzAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'inf_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'inf_ctz_day')->textInput(['onchange' => 'InfCtzAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'inf_ctz_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी मिति(ई.स.)</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_inf_ctz_year')->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'YYYY', 'id' => 'ad_inf_ctz_year'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_inf_ctz_month')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'MM', 'id' => 'ad_inf_ctz_month'])->label('') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ad_inf_ctz_day')->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'DD', 'id' => 'ad_inf_ctz_day'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-heading">जारी जिल्ला</div>
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
                                    'id' => ''
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
                                    'id' => 't'
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
                    'mem_fname_eng',
                    'mem_mname_eng',
                    'mem_lname_eng',
                    'birth_year',
                    'birth_month',
                    'birth_day',
                    'ad_birth_year',
                    'ad_birth_month',
                    'ad_birth_day',
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
                                    <div class="c6 row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <div class="form-heading">सदस्यको नाम(नेपालीमा)</div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_fname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_mname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_lname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label('') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c6 row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; margin-left:5px;">
                                        <div class="form-heading">सदस्यको नाम(In English)</div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_fname_eng")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'First Name'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_mname_eng")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Middle Name'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_lname_eng")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'Last Name'])->label('') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c1 row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; margin-left:5px;">
                                        <div class="form-heading">Gender</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?= $form->field($fam, "[{$i}]mem_gender")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label('')
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
                                    </div>
                                    <div class="c1 row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; margin-left:5px;">
                                        <div class="form-heading">नाता</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?= $form->field($fam, "[{$i}]relation_with_inf")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'सुचकसँगको नाता'])->label('') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c4 row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; margin-left:5px;">
                                        <div class="form-heading">जन्म मिति</div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]birth_year")->textInput(['onchange' => 'MemBirthAd', 'maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'mem_birth_year{i}'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]birth_month")->textInput(['onchange' => 'MemBirthAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'mem_birth_month{i}'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]birth_day")->textInput(['onchange' => 'MemBirthAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'mem_birth_day{i}'])->label('') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c4  row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; margin-left:5px;">
                                        <div class="form-heading">जन्म मिति(ई.स.)</div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]ad_birth_year")->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'YYYY', 'id' => 'ad_mem_birth_year{i}'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]ad_birth_month")->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'MM', 'id' => 'ad_mem_birth_month{i}'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]ad_birth_day")->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'DD', 'id' => 'ad_mem_birth_day{i}'])->label('') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c1" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <div class="form-heading">नागरिकता नं.</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?= $form->field($fam, "[{$i}]mem_ctz_no")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label('') ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="c4 row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; margin-left:5px;">
                                        <div class="form-heading">जारी मिति</div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_ctz_year")->textInput(['onchange' => 'MemCtzAd', 'maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' => 'mem_ctz_year'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_ctz_month")->textInput(['onchange' => 'MemCtzAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'mem_ctz_month'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]mem_ctz_day")->textInput(['onchange' => 'MemCtzAd', 'maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'mem_ctz_day'])->label('') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c4 row form-group" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; margin-left:5px;">
                                        <div class="form-heading">जारी मिति(ई.स.)</div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]ad_mem_ctz_year")->textInput(['maxlength' => 4, 'class' => 'form-control form-control-sm', 'placeholder' => 'YYYY', 'id' => 'ad_mem_ctz_year'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]ad_mem_ctz_month")->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'MM', 'id' => 'ad_mem_ctz_month'])->label('') ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($fam, "[{$i}]ad_mem_ctz_day")->textInput(['maxlength' => 2, 'class' => 'form-control form-control-sm', 'placeholder' => 'DD', 'id' => 'ad_mem_ctz_day'])->label('') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="c2" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px;">
                                        <div class="form-heading">जारी जिल्ला</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?= $form->field($fam, "[{$i}]mem_ctz_district")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm'])->label('')
                                                    ->dropdownList(
                                                        ArrayHelper::map(District::find()->all(), 'name', 'name'),
                                                        [
                                                            'prompt' => 'जिल्ला',
                                                            'class' => 'form-control form-control-sm',
                                                            'id' => ''
                                                        ]
                                                    ) ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row btn btn-sm btn-group text-center" style="flex-grow: 1; flex-shrink: 0; margin-right: 5px; display:flex; align-items:center;  margin-left:5px;">

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
                <p><?= $model->m_scanned_image ?></p>

            </div>
            <div class=" card-footer form-group">
                <?= Html::submitButton($fam->isNewRecord ? 'Submit' : 'Update', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>



<style type="text/css">
    .c1 {
        flex-basis: 10%;
        max-width: 9%;
    }

    .c2 {
        flex-basis: 12%;
        max-width: 12%;
    }

    .c6 {
        flex-basis: 35%;
        max-width: 40%;
    }

    .c4 {
        flex-basis: 20%;
        max-width: 20%;
    }

    .c3 {
        flex-basis: 15%;
        max-width: 15%;
    }

    .hidden {
        display: none;
    }
</style>