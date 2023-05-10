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
/** @var yii\web\View $this */
/** @var app\models\Birth $model */
/** @var yii\widgets\ActiveForm $form */
?>

<!-- <script type="text/javascript">
    
        function father_function(){
            var father_fname = document.getElementById("father_fname").value;
            document.getElementById("informant_fname").value = father_fname;
        }

</script> -->

<div class="card">
    <div class="card-body">
        <div class="birth-form">

    <?php $form = ActiveForm::begin([
        
        'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:13px;', 'class' =>'nepali'],
        'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
    ]); ?>
    <hr>
    <label>दर्ता विवरण</label>
    <div class="row form-group">
        <div class="col-sm-1">
            <?= $form->field($model, 'p_district')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जिल्ला', 'value' => 'चितवन'])->label(' ')?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'p_muni')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गा.वि.स/नगरपालिका', 'value' => 'रत्‍ननगर'])->label(' ') ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'p_ward')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'वडा नं'])->label(' ') ?>
        </div>
        <div class="col-sm-1 nepalify">
            <?= $form->field($model, 'reg_no')->input('integer', ['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता नं.'])->label(' ') ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'reg_year')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता साल'])->label(' ')  ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'reg_month')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता महिना'])->label(' ')  ?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'reg_day')->input('number', ['class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता गते'])->label(' ')  ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'registrar_name')->label(' ')->dropdownList(
                ArrayHelper::map(Registrar::find()->all(),'name', 'name'),
                ['prompt'=>'',
                 'placeholder' => '',
                'class' => 'form-control form-control-sm' ]
                ) ?>
        </div>
    </div>
    <hr>
    <label>नवजात शिशुको विवरण</label>
    <div class="form-group row nepalify" >
        <div class="col-sm-4">
        <label>शिशुको नाम</label>
            <div class="row nepalify">
                <div class="col-sm-4">
                   <?= $form->field($model, 'fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'lname')->textInput(['maxlength' => true,'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label(' ') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <label>जन्म मिति(वि.स.)</label>
            <div class="row">            
                <div class="col-sm-4" >
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
            <label>लिङ्ग</label>
            <div class="row">
                <?= $form->field($model, 'gender')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'लिङ्ग'])->label(' ')->dropdownList(
                ArrayHelper::map(Gender::find()->all(),'gender', 'gender'),
                ['prompt'=>'लिङ्ग',
                'class' => 'form-control form-control-sm' ]
            )?>
            </div>
        </div>
        <div class="col-sm-2">
            <label>जन्मको प्रकार</label>
            <?= $form->field($model, 'birth_type')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मको प्रकार'])->label(' ')->dropdownList(
                ArrayHelper::map(BirthType::find()->all(),'type', 'type'),
                ['prompt'=>'जन्मको प्रकार',
                'class' => 'form-control form-control-sm' ]
            )  ?>
        </div>
        <div class="col-sm-2">
            <label>शिशु जन्मेको स्थान</label>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शिशुको जन्मेको स्थान'])->label(' ')->dropdownList(
                ArrayHelper::map(BirthPlace::find()->all(),'place', 'place'),
                ['prompt'=>'जन्मस्थान',
                'class' => 'form-control form-control-sm' ]
            ) ?>
                </div>
            </div>
        </div>
    </div>   
    <div class="row form-group">
        <div class="col-sm-2">
            <label>जन्म दाता</label>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'helper')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मदा मद्दत गर्ने व्यक्ति'])->label(' ')->dropdownList(
                ArrayHelper::map(Helper::find()->all(),'helper', 'helper'),
                ['prompt'=>'मद्दत गर्ने व्यक्ति',
                'class' => 'form-control form-control-sm' ]
            ) ?>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>जन्मेको देश</label>
            <div class="row nepalify">
                <div class="col-sm-12">
                     <?= $form->field($model, 'bith_country')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मेको देश'])->label(' ') ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- <label>बाजेको विवरण</label> -->
    <div class="row form-group">
        <div class="col-sm-4">
            <label>बाजेको नाम</label>
            <div class="row nepalify">
                <div class="col-sm-4">
                    <?= $form->field($model, 'grandfather_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' => 'grandfather_fname'])->label(' ') ?>
                    </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'grandfather_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' => 'grandfather_mname'])->label(' ') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'grandfather_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' => 'grandfather_lname'])->label(' ') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-१">
            <label>विवाह भएको साल</label>
            <div class="row nepalify">
                <div class="col-sm-12">
                    <?= $form->field($model, 'married_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'विवाह भएको साल'])->label(' ') ?>
                    </div>
            </div>
        </div>
    </div>
    <hr>
    <label>बाबुको विवरण</label>
    <div class="row form-group">
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
        <div class="col-sm-2">
            <label>नागरिकताको विवरण</label>
            <div class="row nepalify">
                <div class="col-sm-12">                  
                    <?= $form->field($model, 'father_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.', 'id' => 'father_ctz_no'])->label(' ') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label>जारी मिति(वि.स.)</label>
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'father_ctz_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल' , 'id' => 'father_ctz_year'])->label(' ') ?>
                    </div>
                    <div class="col-sm-4">
                            <?= $form->field($model, 'father_ctz_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' => 'father_ctz_month'])->label(' ') ?>
                    </div>
                    <div class="col-sm-4">
                            <?= $form->field($model, 'father_ctz_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' => 'father_ctz_day'])->label(' ')?>
                    </div>
                </div>
                    
        </div>
        <div class="col-sm-2">
            <label>जारी जिल्ला</label>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'father_ctz_district')->label(' ')->dropdownList(
                    ArrayHelper::map(District::find()->all(),'name', 'name'),
                    ['prompt'=>'जिल्ला',
                     'class' => 'form-control form-control-sm',
                     'id' => 'father_ctz_district']
                ) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-2">
            <label>स्थायी ठेगाना</label>
            <div class="row nepalify">
                <div class="col-sm-12">
                    <?= $form->field($model, 'father_permanent_address')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label(' ') ?>
                </div>
            </div>            
        </div>
        <div class="col-sm-2">
            <label>शैक्षिक योग्यता</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'father_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्गता'])->label(' ')->dropdownList(
                ArrayHelper::map(Education::find()->all(),'level', 'level'),
                ['prompt'=>'शैक्षिक योग्यता',
                'class' => 'form-control form-control-sm' ]
            ) ?>
                </div>
            </div>            
        </div>
        <div class="col-sm-1">
            <label>मातृ भाषा</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'father_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                ArrayHelper::map(MotherTongue::find()->all(),'mother_tongue', 'mother_tongue'),
                ['prompt'=>'मातृभाषा',
                'class' => 'form-control form-control-sm' ]
            ) ?>
                </div>
            </div>            
        </div>
        <div class="col-sm-1">
            <label>धर्म</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'father_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                ArrayHelper::map(Religion::find()->all(),'religion', 'religion'),
                ['prompt'=>'धर्म',
                'class' => 'form-control form-control-sm' ]
            )?>
                </div>
            </div>            
        </div>
        <div class="col-sm-3">
            <label>हालसम्म बाबुबाट जन्मेको शिशुको सङ्ख्या</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'father_birth_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मेको शिशुको सङ्ख्या'])->label(' ')?>
                </div>
            </div>            
        </div>
        <div class="col-sm-3">
            <label>बाबुबाट जन्मेको शिशुको जिवित सङ्ख्या</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'father_living_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जिवित शिशुको सङ्ख्या'])->label(' ')?>
                </div>
            </div>            
        </div>
    </div>
    <hr>
    <label>आमाको विवरण</label>
    <div class="row form-group">
        <div class="col-sm-4">
            <label>आमाको नाम</label>
            <div class="row nepalify">
                <div class="col-sm-4">
                    <?= $form->field($model, 'mother_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम'])->label(' ') ?>
                    </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'mother_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम'])->label(' ') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'mother_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर'])->label(' ') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>नागरिकताको विवरण</label>
            <div class="row nepalify">
                <div class="col-sm-12">                  
                    <?= $form->field($model, 'mother_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.'])->label(' ') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label>जारी मिति(वि.स.)</label>
                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'mother_ctz_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label(' ') ?>
                    </div>
                    <div class="col-sm-4">
                            <?= $form->field($model, 'mother_ctz_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label(' ') ?>
                    </div>
                    <div class="col-sm-4">
                            <?= $form->field($model, 'mother_ctz_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label(' ')?>
                    </div>
                </div>
                    
        </div>
        <div class="col-sm-2">
            <label>जारी जिल्ला</label>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'mother_ctz_district')->label('')->dropdownList(
                    ArrayHelper::map(District::find()->all(),'name', 'name'),
                    ['prompt'=>'जिल्ला',
                     'class' => 'form-control form-control-sm',
                     'id' => 'mother_ctz_district']
                )?>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-2">
            <label>स्थायी ठेगाना</label>
            <div class="row nepalify">
                <div class="col-sm-12">
                    <?= $form->field($model, 'mother_permanent_address')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'स्थायी ठेगाना'])->label(' ') ?>
                </div>
            </div>            
        </div>
        <div class="col-sm-2">
            <label>शैक्षिक योग्यता</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'mother_education')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शैक्षिक योग्यता'])->label(' ')->dropdownList(
                ArrayHelper::map(Education::find()->all(),'level', 'level'),
                ['prompt'=>'शैक्षिक योग्यता',
                'class' => 'form-control form-control-sm' ]
            ) ?>
                </div>
            </div>            
        </div>
        <div class="col-sm-1">
            <label>मातृ भाषा</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'mother_mother_tongue')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'मातृ भाषा'])->label(' ')->dropdownList(
                ArrayHelper::map(MotherTongue::find()->all(),'mother_tongue', 'mother_tongue'),
                ['prompt'=>'मातृभाषा',
                'class' => 'form-control form-control-sm' ]
            ) ?>
                </div>
            </div>            
        </div>
        <div class="col-sm-1">
            <label>धर्म</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'mother_religion')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'धर्म'])->label(' ')->dropdownList(
                ArrayHelper::map(Religion::find()->all(),'religion', 'religion'),
                ['prompt'=>'धर्म',
                'class' => 'form-control form-control-sm' ]
            )?>
                </div>
            </div>            
        </div>
        <div class="col-sm-3">
            <label>हालसम्म आमाबाट जन्मेको शिशुको सङ्ख्या</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'mother_birth_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जन्मेको शिशुको सङ्ख्या'])->label(' ')?>
                </div>
            </div>            
        </div>
        <div class="col-sm-3">
            <label>आमाबाट जन्मेको शिशुको जिवित सङ्ख्या</label>
            <div class="row">
                <div class="col-sm-12">
                <?= $form->field($model, 'mother_living_count')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'जिवित शिशुको सङ्ख्या'])->label(' ')?>
                </div>
            </div>            
        </div>
    </div>
    <hr>

    <label>सूचकको विवरण</label>
    <div class="row form-check" >
        <div class="form-check-inline ">
            <label >बाबु
            <input class="form-check-input" type="radio" name="radiobtn" id="father-checkbox"  >
            </label>
        </div>
        <div class="form-check-inline ">
            <label>आमा
            <input class="form-check-input" type="radio" name="radiobtn" id="mother-checkbox"  >
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
            <label>सूचकको नाम</label>
            <div class="row nepalify">
                <div class="col-sm-4" >
                    <?= $form->field($model, 'informant_fname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'पहिलो नाम', 'id' =>'informant_fname'])->label(' ') ?>
                    </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'informant_mname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'बीचको नाम', 'id' =>'informant_mname'])->label(' ') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'informant_lname')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'थर', 'id' =>'informant_lname'])->label(' ') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label>नाता</label>
            <div class="row nepalify">
                <div class="col-sm-12">
                    <?= $form->field($model, 'relation')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'शिशुसँगको नाता'])->label(' ') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <label>नागरिकताको विवरण</label>
            <div class="row">

                <div class="col-sm-3 nepalify">
                    <?= $form->field($model, 'inf_ctz_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'नागरिकता नं.', 'id' =>'inf_ctz_no'])->label(' ') ?>
                    </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'inf_ctz_year')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'साल', 'id' =>'inf_ctz_year'])->label(' ') ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'inf_ctz_month')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'महिना', 'id' =>'inf_ctz_month'])->label(' ') ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'inf_ctz_day')->textInput(['class' => 'form-control form-control-sm', 'placeholder' => 'गते', 'id' =>'inf_ctz_day'])->label(' ')?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($model, 'inf_ctz_district')->dropdownList(
                    ArrayHelper::map(District::find()->all(),'name', 'name'),
                    ['prompt'=>'जिल्ला',
                     'class' => 'form-control form-control-sm',
                     'id' => 'inf_ctz_district']
                )->label(' ') ?>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row ">
        <label>स्क्यान गरिएको फोटो अपलोड गर्नुहोस</label>
        <div class="col-sm-12">
                <?= $form->field($model, 'scanned_image')->fileInput(['id' => 'fileInput'])->label('') ?>
                    <!-- Display the uploaded image file name -->
                     <?= $model->scanned_image ?></p>

            </div>
    </div>
    

    

<hr>
    <div class="form-group">
        <?= Html::submitButton('Submit',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>




