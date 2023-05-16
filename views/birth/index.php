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
    
        <div class="birth-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
            <?php Pjax::begin(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <?= Html::a('Create Birth', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                        <?= Html::a('Export Data', ['birth/export'], ['class' => 'btn btn-primary btn-sm']) ?>
                    </div>
                    <div class="col-sm-10 ">
                        <div class="row">
                            <div class="col">
                                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="card-body">            
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions' => [
                            'class' => 'table  table-bordered table-hover table-condensed table-striped',
                            'style' => 'width:100%'],
                        'layout' => "{items}\n{summary}\n{pager}",
                        'options' => ['style' => 'font-size:13px;'],
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['label' => 'दर्ता नं.',
                             'attribute' => 'reg_no',
                             'value' => function ($model) 
                             {                
                               return $model->reg_no;
                            }
                            ],
                            ['label' => 'दर्ता मिति(वि.स.)',
                             'attribute' => 'reg_year',
                             'value' => function ($model) 
                             {                
                               return $model->reg_year . '-' . $model->reg_month . '-' . $model->reg_day;
                             }
                            ],
                           ['attribute' => 'fname',
                            'label' =>   'शिशुको नाम', 
                            'value' => function ($model) 
                            {
                               return $model->fname . ' ' . $model->mname . ' ' . $model->lname;
                            }
                            ],
                            ['attribute' => 'birth_year',
                             'label' =>   'जन्म मिति(वि.स.)', 
                             'value' => function ($model) 
                            {
                               return $model->birth_year . '-' . $model->birth_month . '-' . $model->birth_day;
                            }
                            ],
                            ['attribute' => 'grandfather_fname',
                            'label' =>   'बाजेको नाम', 
                            'value' => function ($model) {
                               return $model->grandfather_fname . ' ' . $model->grandfather_mname . ' ' . $model->grandfather_lname;
                            }],
                            ['attribute' => 'father_fname',
                                'label' =>   'बाबुको नाम', 
                                'value' => function ($model) {
                                   return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname;
                               }
                            ],  
                                    
                            ['attribute' => 'mother_fname',
                                'label' =>   'आमाको नाम', 
                                'value' => function ($model) {
                                   return $model->mother_fname . ' ' . $model->mother_mname . ' ' . $model->mother_lname;
                               }
                            ],  
                                    
                            ['attribute' => 'informant_fname',
                                'label' =>   'सूचकको नाम', 
                                'value' => function ($model) {
                                   return $model->informant_fname . ' ' . $model->informant_mname . ' ' . $model->informant_lname;
                               }],
                                   
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'options' => ['style' => 'width:auto;'],
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
                </div>
            </div>
            <?php Pjax::end(); ?>
        </div>
     
</div>
