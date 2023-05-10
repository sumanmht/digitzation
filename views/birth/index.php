<?php

use app\models\Birth;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
// use yii\widgets\LinkPager;
// use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\BirthSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Births';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">
        <div class="birth-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

            <div class="row">
                <div class="col-sm-1">
                    <?= Html::a('Create Birth', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                </div>
                <div class="col-sm-1">
                    <?= Html::a('Export Data', ['birth/export'], ['class' => 'btn btn-primary btn-sm']) ?>
                </div>
            
            </div>
    
            <?php Pjax::begin(); ?>
            <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table  table-bordered table-hover table-condensed table-responsive table-striped'],
                'options' => ['style' => 'font-size:12px;'],
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['label' => 'दर्ता नं.',
                     'attribute' => 'reg_no',
                     'value' => function ($model) {                
                       return $model->reg_no;
                   }],
                    ['label' => 'दर्ता मिति(वि.स.)',
                     'attribute' => 'reg_year',
                     'value' => function ($model) {                
                       return $model->reg_year . '-' . $model->reg_month . '-' . $model->reg_day;
                   }],
                   ['attribute' => 'fname',
                                'label' =>   'शिशुको नाम', 
                                'value' => function ($model) {
                                   return $model->fname . ' ' . $model->mname . ' ' . $model->lname;
                               }
                             ],
                             ['attribute' => 'birth_year',
                                'label' =>   'जन्म मिति(वि.स.)', 
                                'value' => function ($model) {
                                   return $model->birth_year . '-' . $model->birth_month . '-' . $model->birth_day;
                               }
                             ],
                             // ['attribute' => 'gender',
                             //    'label' =>   'लिङ्ग', 
                             //    'value' => function ($model) {
                             //       return $model->gender;
                             //   }
                             // ],
                             ['attribute' => 'grandfather_fname',
                                'label' =>   'बाजेको नाम', 
                                'value' => function ($model) {
                                   return $model->grandfather_fname . ' ' . $model->grandfather_mname . ' ' . $model->grandfather_lname;
                               }
                             ],
                             ['attribute' => 'father_fname',
                                'label' =>   'बाबुको नाम', 
                                'value' => function ($model) {
                                   return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname;
                               }
                             ],  
                             // ['attribute' => 'father_ctz_no.',
                             //    'label' =>   'नागरिकता विवरण', 
                             //    'value' => function ($model) {
                             //       return $model->father_ctz_no . ' / ' . $model->father_ctz_year . '-'  . $model->father_ctz_month . '-' . $model->father_ctz_day . ' / ' . $model->father_ctz_district;
                             //   },
                             // ],
                             ['attribute' => 'mother_fname',
                                'label' =>   'आमाको नाम', 
                                'value' => function ($model) {
                                   return $model->mother_fname . ' ' . $model->mother_mname . ' ' . $model->mother_lname;
                               }
                             ],  
                             // ['attribute' => 'mother_ctz_no.',
                             //    'label' =>   'नागरिकता विवरण', 
                             //    'value' => function ($model) {
                             //       return $model->mother_ctz_no . ' / ' . $model->mother_ctz_year . '-' . $model->mother_ctz_month . '-' . $model->mother_ctz_day . '/ ' . $model->mother_ctz_district;
                             //   }
                             // ], 
                            ['attribute' => 'informant_fname',
                                'label' =>   'सूचकको नाम', 
                                'value' => function ($model) {
                                   return $model->informant_fname . ' ' . $model->informant_mname . ' ' . $model->informant_lname;
                               }
                             ],
                            // ['attribute' => 'relation',
                            //     'label' =>   'शिशुसँगको नाता', 
                            //     'value' => function ($model) {
                            //        return $model->relation;
                            //    }
                            //  ],  
                            //  ['attribute' => 'inf_ctz_no.',
                            //     'label' =>   'नागरिकता विवरण', 
                            //     'value' => function ($model) {
                            //        return $model->inf_ctz_no . ' / ' . $model->inf_ctz_year . '-' . $model->inf_ctz_month . '-' . $model->inf_ctz_day . '/ ' . $model->inf_ctz_district;
                            //    }
                            //  ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'options' => ['style' => 'width:100px;'],
                        'buttonOptions' => ['class' => 'btn btn-default'],
                        'template' => '<div class = "btn-group btn-group-sm text-center" role ="group">{view}{update}{delete}</div>' 
                    ],
                    // [
                    //     'class' => ActionColumn::className(),
                    //     'urlCreator' => function ($action, Birth $model, $key, $index, $column) {
                    //         return Url::toRoute([$action, 'id' => $model->id]);
                    //      }
                    // ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>

        </div>
        

    </div>  
</div>
