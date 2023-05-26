<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Mig $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Migs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="mig-view col-sm-6">

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
                        ['attribute' => 'inf_fname',
                            'label' =>   'सुचकको नाम', 
                            'value' => function ($form, $widget) {
                                $model = $widget->model;
                               return $model->inf_fname . ' ' . $model->inf_mname . ' ' . $model->inf_lname;
                           }
                         ],
                         ['attribute' => 'inf_birth_year',
                            'label' =>   'जन्म मिति(वि.स.)', 
                            'value' => function ($form, $widget) {
                                $model = $widget->model;
                               return $model->inf_birth_year . '-' . $model->inf_birth_month . '-' . $model->inf_birth_day;
                           }
                         ],
                         ['attribute' => 'inf_gender',
                            'label' =>   'लिङ्ग', 
                            'value' => function ($form, $widget) {
                                $model = $widget->model;
                               return $model->inf_gender;
                           }
                         ],
                           
                         ['attribute' => 'inf_ctz_no.',
                            'label' =>   'नागरिकता विवरण', 
                            'value' => function ($form, $widget) {
                                $model = $widget->model;
                               return $model->inf_ctz_no . ' / ' . $model->inf_ctz_year . '-'  . $model->inf_ctz_month . '-' . $model->inf_ctz_day . ' / ' . $model->inf_ctz_district;
                           },
                         ],
                          
                        ['attribute' => 'going_district',
                            'label' =>   'बसाई सरी गएको ठेगाना', 
                            'value' => function ($form, $widget) {
                                $model = $widget->model;
                               return $model->going_district . ' ' . $model->going_local_level . ' ' . $model->going_ward;
                           }
                         ],
                        ['attribute' => 'coming_district',
                            'label' =>   'बसाई सरी आएको ठेगाना', 
                            'value' => function ($form, $widget) {
                                $model = $widget->model;
                               return $model->coming_district . ' ' . $model->coming_local_level . ' ' . $model->coming_ward;
                           }
                         ],              
                        ],
                    ]) ?>
                </div>
                


            </div>
                <div class="mig-view col-sm-6">
                    <?php echo DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><td style="width:100%;">{value}</td></tr>',
                    //'valueColOptions'=>['style'=>'width:70%'],
                    'attributes' => [
                        ['attributes' => 'm_scanned_image',
                        'label' => '',
                        'value' => Yii::getAlias('@web/uploads').'/'.$model->m_scanned_image,
                            'format' => ['image', ['class' =>'img-fluid']]                        
                    ],
                    ]
                    ])?> 
                    
                </div>
                
            </div>
            <div class="row">
                    <?= DetailView::widget([
                        'model' => $fams,
                        'options' => ['style' => 'font-size:13px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' => '<tr><th style="text-align:center; border:1px solid black;">सदस्यहरु</th></tr><tr><td style="width:100%; border: 1px solid black;">{value}</td></tr>',
                        'attributes' => [
                        
                         [
                            'attribute' => 'mem_fname',
                            'label' => 'hhh',
                            'value' => function ($fams){
                                $html = '<table class="table table-bordered">';
                                $html .= '<thead>';
                                $html .= '<tr>';
                                $html .= '<th>क्र.स.</th>';
                                $html .= '<th>नाम</th>';                                
                                $html .= '<th>जन्म मिति(वि.स.)</th>';
                                $html .= '<th>नागरिकता नं. </th>';
                                $html .= '<th>जारी मिति(वि.स.)</th>';
                                $html .= '<th>जारी जिल्ला</th>';
                                $html .= '<th>लिङ्ग</th>';
                                $html .= '<th>सुचकसँको नाता</th>';
                                $html .= '</tr>';
                                $html .= '</thead>';
                                $html .= '<tbody>';
                                $serialNumber = 1;
                                foreach ($fams as $data) {
                                    $html .= '<tr>';
                                    $html .= '<td>' . $serialNumber++.'</td>';
                                    $html .= '<td>' . $data['mem_fname'] . ' ' .$data['mem_mname'] . ' ' .$data['mem_lname'] .'</td>';
                                    $html .= '<td>' . $data['birth_year'] . ' ' .$data['birth_month'] . ' ' .$data['birth_day'] .'</td>';
                                    $html .= '<td>' . $data['mem_ctz_no'] . '</td>';
                                    $html .= '<td>' . $data['mem_ctz_year'] . ' ' .$data['mem_ctz_month'] . ' ' .$data['mem_ctz_day'] .'</td>';
                                    $html .= '<td>' . $data['mem_ctz_district'] . '</td>';
                                    $html .= '<td>' . $data['mem_gender'] . '</td>';
                                    $html .= '<td>' . $data['relation_with_inf'] . '</td>';
                                    $html .= '</tr>';
                                }
                                $html .= '</tbody>';
                                $html .= '</table>';
                                return $html;
                            },
                            'format' => 'html',
                        ],
              
                        ],
                    ]) ?>
                </div>
        </div>
        
    </div>
    <div class="card-footer">
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
