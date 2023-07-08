<?php

use app\models\Divorce;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\DivorceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Divorces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="divorce-index">
        <?php Pjax::begin(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <?= Html::a('Create Divorce', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                    <?= Html::a('Export Data', ['export'], ['class' => 'btn btn-primary btn-sm']) ?>
                </div>
                <div class="col-sm-9 ">
                    <div class="row">
                        <div class="col">
                            <?php // echo $this->render('_search', ['model' => $searchModel]); 
                            ?>
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
                        'style' => 'width:100%'
                    ],
                    'layout' => "{items}\n{summary}\n{pager}",
                    'options' => ['style' => 'font-size:0.7rem;'],
                    'pager' => [
                        'class' =>  CustomPager::class,

                    ],
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'स्थायी ठेगाना',
                            'attribute' => 'local_level',
                            'value' => function ($model) {
                                return $model->district . '-' . $model->local_level . '-' . $model->ward;;
                            }
                        ],
                        [
                            'label' => 'दर्ता नं.',
                            'attribute' => 'reg_no',
                            'value' => function ($model) {
                                return $model->reg_no;
                            }
                        ],
                        [
                            'label' => 'दर्ता मिति(वि.स.)',
                            'attribute' => 'reg_year',
                            'value' => function ($model) {
                                return $model->reg_year . '-' . $model->reg_month . '-' . $model->reg_day;
                            }
                        ],
                        [
                            'label' => 'विवाह मिति(वि.स.)',
                            'attribute' => 'marriage_year',
                            'value' => function ($model) {
                                return $model->marriage_year . '-' . $model->marriage_month . '-' . $model->marriage_day;
                            }
                        ],
                        [
                            'label' => 'अदालतको नाम/ठेगाना',
                            'attribute' => 'court_name',
                            'value' => function ($model) {
                                return $model->court_name . '/' . $model->court_address;
                            }
                        ],
                        [
                            'label' => 'निर्णय मिति(वि.स.)',
                            'attribute' => 'decison_year',
                            'value' => function ($model) {
                                return $model->decision_year . '-' . $model->decision_month . '-' . $model->decision_day;
                            }
                        ],
                        [
                            'attribute' => 'groom_fname',
                            'label' =>   'दुलहाको नाम',
                            'value' => function ($model) {
                                return $model->groom_fname . ' ' . $model->groom_mname . ' ' . $model->groom_lname;
                            }
                        ],
                        [
                            'attribute' => 'bride_fname',
                            'label' =>   'दुलहीको नाम',
                            'value' => function ($model) {
                                return $model->bride_fname . ' ' . $model->bride_mname . ' ' . $model->bride_lname;
                            }
                        ],
                        [
                            'attribute' => 'inf_fname',
                            'label' =>   'सुचकको नाम',
                            'value' => function ($model) {
                                return $model->inf_fname . ' ' . $model->inf_mname . ' ' . $model->inf_lname;
                            }
                        ],
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