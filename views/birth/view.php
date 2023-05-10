<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Birth $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Births', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="birth-view col-sm-5">

            <!-- <h1><?= Html::encode($this->title) ?></h1> -->
            <div class="row">
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => ['style' => 'font-size:13px;', 'class' => 'table table-bordered table-hover table-condensed '],
                    'template' => '<tr><th style="width:40%; border: 1px solid black;">{label}</th><td style="width:60%; border: 1px solid black;">{value}</td></tr>',
                    'attributes' => [
                        ['attribute' => 'p_district',
                        'label' =>   'ठेगाना', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->p_district . ' ' . $model->p_muni . '' . $model->p_ward;
                       }
                       
                     ], 
                    ],
                ]) ?>
            </div>
            <div class="row">
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => ['style' => 'font-size:13px;', 'class' => 'table table-bordered table-hover table-condensed '],
                    'template' => '<tr><th style="width:40%; border: 1px solid black;">{label}</th><td style="width:60%; border: 1px solid black;">{value}</td></tr>',
                    'attributes' => [
                        ['attribute' => 'reg_no',
                        'label' =>   'दर्ता नं.', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->reg_no;
                       }, 
                     ],
                     ['attribute' => 'reg_year',
                        'label' =>   'दर्ता मिति(वि.स.)', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->reg_year . '-' . $model->reg_month . '-' . $model->reg_day;
                       }
                     ],
                     ['attribute' => 'registrar_name',
                        'label' =>   'स्थानीय पञ्जिकाधिकारी', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->registrar_name;
                       }
                     ],                        
                    ],
                ]) ?>
            </div>
            <div class="row">
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => ['style' => 'font-size:13px;', 'class' => 'table table-bordered table-hover table-condensed '],
                    'template' => '<tr><th style="width:40%; border: 1px solid black;">{label}</th><td style="width:60%; border: 1px solid black;">{value}</td></tr>',
                    'attributes' => [
                    ['attribute' => 'fname',
                        'label' =>   'शिशुको नाम', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->fname . ' ' . $model->mname . ' ' . $model->lname;
                       }
                     ],
                     ['attribute' => 'birth_year',
                        'label' =>   'जन्म मिति(वि.स.)', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->birth_year . '-' . $model->birth_month . '-' . $model->birth_day;
                       }
                     ],
                     ['attribute' => 'gender',
                        'label' =>   'लिङ्ग', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->gender;
                       }
                     ],
                     ['attribute' => 'grandfather_fname',
                        'label' =>   'बाजेको नाम', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->grandfather_fname . ' ' . $model->grandfather_mname . ' ' . $model->grandfather_lname;
                       }
                     ],
                     ['attribute' => 'father_fname',
                        'label' =>   'बाबुको नाम', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname;
                       }
                     ],  
                     ['attribute' => 'father_ctz_no.',
                        'label' =>   'नागरिकता विवरण', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->father_ctz_no . ' / ' . $model->father_ctz_year . '-'  . $model->father_ctz_month . '-' . $model->father_ctz_day . ' / ' . $model->father_ctz_district;
                       },
                     ],
                     ['attribute' => 'mother_fname',
                        'label' =>   'आमाको नाम', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->mother_fname . ' ' . $model->mother_mname . ' ' . $model->mother_lname;
                       }
                     ],  
                     ['attribute' => 'mother_ctz_no.',
                        'label' =>   'नागरिकता विवरण', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->mother_ctz_no . ' / ' . $model->mother_ctz_year . '-' . $model->mother_ctz_month . '-' . $model->mother_ctz_day . '/ ' . $model->mother_ctz_district;
                       }
                     ], 
                    ['attribute' => 'informant_fname',
                        'label' =>   'सूचकको नाम', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->informant_fname . ' ' . $model->informant_mname . ' ' . $model->informant_lname;
                       }
                     ],
                    ['attribute' => 'relation',
                        'label' =>   'शिशुसँगको नाता', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->relation;
                       }
                     ],  
                     ['attribute' => 'inf_ctz_no.',
                        'label' =>   'नागरिकता विवरण', 
                        'value' => function ($form, $widget) {
                            $model = $widget->model;
                           return $model->inf_ctz_no . ' / ' . $model->inf_ctz_year . '-' . $model->inf_ctz_month . '-' . $model->inf_ctz_day . '/ ' . $model->inf_ctz_district;
                       }
                     ],              
                    ],
                ]) ?>
            </div>
            </div>
                <div class="birth-view col-sm-7">
                    <?php echo DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th style="width:0%; ">{label}</th><td style="width:100%;">{value}</td></tr>',
                    //'valueColOptions'=>['style'=>'width:70%'],
                    'attributes' => [
                        ['attributes' => 'scanned_image',
                        'label' => '',
                        'value' => Yii::getAlias('@web/uploads').'/'.$model->scanned_image,
                            'format' => ['image', ['class' =>'img-fluid']]                        
                    ],
                    ]
                    ])?> 
                    <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</div>