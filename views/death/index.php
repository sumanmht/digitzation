<?php

use app\models\Death;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\CustomPager;
use kartik\export\ExportMenu;
use kartik\mpdf\Pdf;

/** @var yii\web\View $this */
/** @var app\models\DeathSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Deaths';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="death-index">
        <?php Pjax::begin(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <?= Html::a('Create Death', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                    <?= Html::a('Export Data', ['export'], ['class' => 'btn btn-primary btn-sm']) ?>
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
        <div class="card-body">
            <div class="table-responsive">
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
                            'attribute' => 'fname',
                            'label' =>   'मृतकको नाम',
                            'value' => function ($model) {
                                return $model->fname . ' ' . $model->mname . ' ' . $model->lname;
                            }
                        ],
                        [
                            'attribute' => 'death_year',
                            'label' =>   'मृत्यु मिति(वि.स.)',
                            'value' => function ($model) {
                                return $model->death_year . '-' . $model->death_month . '-' . $model->death_day;
                            }
                        ],

                        [
                            'attribute' => 'father_fname',
                            'label' =>   'बाबुको नाम',
                            'value' => function ($model) {
                                return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname;
                            }
                        ],
                        [
                            'attribute' => 'spouse_fname',
                            'label' =>   'पति/पत्नी नाम',
                            'value' => function ($model) {
                                return $model->spouse_fname . ' ' . $model->spouse_mname . ' ' . $model->spouse_lname;
                            }
                        ],

                        [
                            'attribute' => 'inf_fname',
                            'label' =>   'सूचकको नाम',
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