<?php

use app\models\Birth;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\CustomPager;
use kartik\export\ExportMenu;
use kartik\mpdf\Pdf;
use yii\widgets\ActiveForm;

// use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\BirthSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Births';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$this->registerJsFile('@web/js/nepa.js', ['depends' => 'yii\web\JqueryAsset']);


?>

<div class="card">
    <div class="birth-index">
        <?php Pjax::begin(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <?= Html::a('Create Birth', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
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
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'Permanent Address',
                            'attribute' => 'p_district',
                            'value' => function ($model) {
                                return $model->p_district . '-' . $model->p_muni;
                            }
                        ],
                        [
                            'label' => 'Ward No.',
                            'attribute' => 'p_ward',
                            'value' => function ($model) {
                                return $model->p_ward;
                            }
                        ],
                        [
                            'label' => 'Registration No.',
                            'attribute' => 'reg_no',
                            'value' => function ($model) {
                                return $model->reg_no;
                            }
                        ],

                        [
                            'label' => 'Registration Date(B.S.)',
                            'attribute' => 'reg_year',
                            'value' => function ($model) {
                                return Yii::$app->engToUni->convert($model->reg_year) . '-' .
                                    Yii::$app->engToUni->convert($model->reg_month) . '-' .
                                    Yii::$app->engToUni->convert($model->reg_day);
                            }
                        ],
                        [
                            'attribute' => 'fname',
                            'label' =>   'Name',
                            'value' => function ($model) {
                                return $model->fname . ' ' . $model->mname . ' ' . $model->lname;
                            }
                        ],
                        [
                            'attribute' => 'birth_year',
                            'label' =>   'Date of Birth',
                            'value' => function ($model) {
                                return Yii::$app->engToUni->convert($model->birth_year) . '-' .
                                    Yii::$app->engToUni->convert($model->birth_month) . '-' .
                                    Yii::$app->engToUni->convert($model->birth_day);
                            },

                        ],
                        // [
                        //     'attribute' => 'grandfather_fname',
                        //     'label' =>   'बाजेको नाम',
                        //     'value' => function ($model) {
                        //         return $model->grandfather_fname . ' ' . $model->grandfather_mname . ' ' . $model->grandfather_lname;
                        //     }
                        // ],
                        [
                            'attribute' => 'father_fname',
                            'label' =>   'Name of Father',
                            'value' => function ($model) {
                                return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname;
                            }
                        ],

                        [
                            'attribute' => 'mother_fname',
                            'label' =>   'Name of Mother',
                            'value' => function ($model) {
                                return $model->mother_fname . ' ' . $model->mother_mname . ' ' . $model->mother_lname;
                            }
                        ],

                        [
                            'attribute' => 'informant_fname',
                            'label' =>   'Name of informant',
                            'value' => function ($model) {
                                return $model->informant_fname . ' ' . $model->informant_mname . ' ' . $model->informant_lname;
                            }
                        ],


                        [
                            'class' => 'yii\grid\ActionColumn',
                            'options' => ['style' => 'width:auto;'],
                            'buttonOptions' => [
                                'class' => 'btn btn-default btn-sm',
                                'style' => 'border:none; padding:none; margin:none;',
                            ],
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