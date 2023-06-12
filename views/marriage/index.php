<?php

use app\models\Marriage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\CustomPager;

/** @var yii\web\View $this */
/** @var app\models\MarriageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Marriages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="marriage-index">
        <?php Pjax::begin(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <?= Html::a('Create Marriage', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                    <!-- <?= Html::a('Export Data', ['export'], ['class' => 'btn btn-primary btn-sm']) ?> -->
                </div>
                <div class="col-sm-9 ">
                    <div class="row">
                        <div class="col">
                            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class=" table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'tableOptions' => [
                        'class' => 'table  table-bordered table-hover table-condensed table-striped',
                        'style' => 'width:100%'
                    ],
                    'layout' => "{items}\n{summary}\n{pager}",
                    'options' => ['style' => 'font-size:12px;'],
                    'pager' => [
                        'class' =>  CustomPager::class,

                    ],
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'ठेगाना',
                            'attribute' => 'district',
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
                            'attribute' => 'inf1_fname',
                            'label' =>   'सुचकको नाम',
                            'value' => function ($model) {
                                return $model->inf1_fname . ' ' . $model->inf1_mname . ' ' . $model->inf1_lname . '/' . $model->inf2_fname . ' ' . $model->inf2_mname . ' ' . $model->inf2_lname;
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