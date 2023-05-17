<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Registrar;
use app\models\District;
use app\models\FamilyMember;
use app\models\Model;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Gender;
/** @var yii\web\View $this */
/** @var app\models\Migrated $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php $form = ActiveForm::begin([
'id' => 'dynamic-form',
'options' => ['enctype' => 'multipart/form-data', 'style' => 'font-size:13px;', 'class' =>'nepali'],
'fieldConfig' => ['labelOptions' => ['class' => 'col-sm-1 control-label'],]
]); ?>

<div class ="card">
    <div class="card-body">
        <div class="migrated-form">
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <label>दर्ता विवरण</label>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'दर्ता नं.'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'reg_year')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'साल'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'reg_month')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'महिना'])->label('') ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'reg_day')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder' => 'गते'])->label('') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label>बसाई सराई मिति(वि.स.)</label>
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
                <div class="col-sm-3">
                    <label>स्थानीय पञ्जिकाधिकारी</label>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'registrar_name')->label('')->dropdownList(
                                ArrayHelper::map(Registrar::find()->all(),'name', 'name'),
                                ['prompt'=>'',
                                 'placeholder' => '',
                                'class' => 'form-control form-control-sm' ]
                            )?>
                        </div>
                    </div>
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
            <div class="row form-check" >
                <div class="form-check-inline ">
                    <label >बसाई सरी जाने
                    <input class="form-check-input" type="radio"  name="radiobtn" id="goingbtn"  >
                    </label>
                </div>
                <div class="form-check-inline ">
                    <label>बसाई सरी आउने
                    <input class="form-check-input" type="radio"  name="radiobtn" id="comingbtn"  >
                    </label>
                </div>

            </div>
            <hr>
            <div class="row hidden " id="goingrow">                
                <div class="col">
                    <label>बसाई सरी जाने ठेगाना</label>
                    <div class="row " >
                        <div class="col-sm-2">
                            <?= $form->field($model, 'going_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(),'name', 'name'),
                                ['prompt'=>'जिल्ला',
                                 'class' => 'form-control form-control-sm',
                                 'id' => 'father_ctz_district']
                            ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'going_local_level')->textInput(['maxlength' => true, 'class'=>'form-control form-control-sm'])->label(' ') ?>
                        </div>
                        <div class="col-sm-1">
                            <?= $form->field($model, 'going_ward')->textInput(['maxlength' => true, 'class'=>'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row  hidden" id="comingrow">                
                <div class="col">
                    <label>बसाई सरी आएको ठेगाना</label>
                    <div class="row " >
                        <div class="col-sm-2">
                            <?= $form->field($model, 'coming_district')->label(' ')->dropdownList(
                                ArrayHelper::map(District::find()->all(),'name', 'name'),
                                ['prompt'=>'जिल्ला',
                                 'class' => 'form-control form-control-sm',
                                 'id' => 'father_ctz_district']
                            ) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($model, 'coming_local_level')->textInput(['maxlength' => true, 'class'=>'form-control form-control-sm'])->label(' ') ?>
                        </div>
                        <div class="col-sm-1">
                            <?= $form->field($model, 'coming_ward')->textInput(['maxlength' => true, 'class'=>'form-control form-control-sm'])->label(' ') ?>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 15, // the maximum times, an element can be added (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $mems[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'member_fname',
                    'member_mname',
                    'member_lname',
                    'birth_year',
                    'birth_month',
                    'birth_day',
                    'mem_gender',
                    'mem_birth_place',
                    'relation_with_inf',
                ],
            ]); ?>
            <div class="card">
                <div class="card-body">
                    <label>Members</label>
                    <div class="container-items">
                                <!-- widgetBody -->
                        <?php foreach ($mems as $i => $mem): ?>
                                    <!-- widgetItem -->
                            <?php
                                                // necessary for update action.
                                if (! $mem->isNewRecord) 
                                {
                                    echo Html::activeHiddenInput($mem, "[{$i}]id");
                                }
                            ?>

                            <div class="form form-group item">
                                <table class="table-responsive">
                                    <tr>
                                        <td class="col-sm-2">
                                            <?= $form->field($mem, "[{$i}]member_fname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'पहिलो नाम'])->label('') ?>
                                        </td>
                                        <td class="col-sm-2">
                                            <?= $form->field($mem, "[{$i}]member_mname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'बीचको नाम'])->label('') ?>
                                        </td>
                                        <td class="col-sm-2">
                                            <?= $form->field($mem, "[{$i}]member_lname")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'थर'])->label('') ?>
                                        </td>
                                        <td class="col-sm-1">
                                            <?= $form->field($mem, "[{$i}]birth_year")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'साल'])->label('') ?>
                                        </td>
                                        <td class="col-sm-1">
                                            <?= $form->field($mem, "[{$i}]birth_month")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'महिना'])->label('') ?>
                                        </td>
                                        <td class="col-sm-1">
                                            <?= $form->field($mem, "[{$i}]birth_day")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'गते'])->label('') ?>
                                        </td>
                                        <td class="col-sm-1">
                                            <?= $form->field($mem, "[{$i}]mem_gender")->textInput(['maxlength' => true])->label('')->dropdownList(
                                                ArrayHelper::map(Gender::find()->all(),'gender', 'gender'),
                                                ['prompt'=>'',
                                                 'class' => 'form-control form-control-sm',
                                                 'id' => 'mem_gender',
                                                 'placeholder' => 'लिङ्ग']
                                            )  ?>
                                        </td>
                                        <td class="col-sm-1">
                                            <?= $form->field($mem, "[{$i}]mem_birth_place")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'जन्मस्थान'])->label('') ?>
                                        </td>
                                        <td class="col-sm-1">
                                            <?= $form->field($mem, "[{$i}]relation_with_inf")->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm', 'placeholder'=>'सूचकसँगको नाता'])->label('') ?>
                                        </td>
                                        <td>
                                            <button type="button" class="remove-item btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        <?php endforeach; ?>                    
                        
                    </div>
                    <button type="button" class="add-item btn btn-success btn-sm ">Add Members</button>
                </div>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        
        <?= $form->field($model, 'migration_scanned_image')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($mem->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>

            </div>

    </div>
</div>
<?php ActiveForm::end(); ?>

<style type="text/css">
    .hidden{
        display: none;
    }
    
</style>



