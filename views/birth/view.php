<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\mpdf\Pdf;

/** @var yii\web\View $this */
/** @var app\models\Birth $model */

$this->title = $model->fname_eng . ' ' . $model->mname_eng . ' ' . $model->lname_eng;;
$this->params['breadcrumbs'][] = ['label' => 'Births', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card">
    <div class="card-header">
        <h5>
            <center>जन्म दर्ता अभिलेख: <?= $model->fname . ' ' . $model->mname . ' ' . $model->lname;; ?></center>
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="birth-view col-sm-5">

                <div class="row">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' =>   function ($attribute, $index, $widget) {
                            if ($index === 0) {
                                return '<tr><th colspan="2" style="text-align:center">दर्ता विवरण</th></tr>';
                            }
                            return '<tr><th style="width:40%">' . $attribute['label'] . '</th><td style="width:60%">' . $attribute['value'] . '</td></tr>';
                        },
                        'attributes' => [
                            [
                                'attribute' => 'p_district',
                                'label' => '',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '';
                                },
                            ],
                            [
                                'attribute' => 'p_district',
                                'label' =>   'ठेगाना',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->p_district . '-' . $model->p_muni . '-' . $model->p_ward;
                                }

                            ],
                            [
                                'attribute' => 'reg_no',
                                'label' =>   'दर्ता नं.',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->reg_no;
                                },
                            ],
                            [
                                'attribute' => 'reg_year',
                                'label' =>   'दर्ता मिति',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स.' . ' ' . Yii::$app->engToUni->convert($model->reg_year) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_month) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_day) . ' / ' .
                                        $model->ad_reg_year . '-' . $model->ad_reg_month . '-' . $model->ad_reg_day . ' ' . 'A.D.';
                                }
                            ],

                            [
                                'attribute' => 'registrar_name',
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
                        'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' =>   function ($attribute, $index, $widget) {
                            if ($index === 0) {
                                return '<tr><th colspan="2" style="text-align:center">शिशुको विवरण</th></tr>';
                            }
                            return '<tr><th style="width:40%">' . $attribute['label'] . '</th><td style="width:60%">' . $attribute['value'] . '</td></tr>';
                        },
                        'attributes' => [
                            [
                                'attribute' => 'fname',
                                'label' => '',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '';
                                },
                            ],
                            [
                                'attribute' => 'fname',
                                'label' =>   'नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->fname . ' ' . $model->mname . ' ' . $model->lname . ' / ' . $model->fname_eng . ' ' . $model->mname_eng . ' ' . $model->lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'birth_year',
                                'label' =>   'जन्म मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स.' . ' ' . Yii::$app->engToUni->convert($model->birth_year) . '-' .
                                        Yii::$app->engToUni->convert($model->birth_month) . '-' .
                                        Yii::$app->engToUni->convert($model->birth_day) . ' / ' .
                                        $model->ad_birth_year . '-' . $model->ad_birth_month . '-' . $model->ad_birth_day . ' ' . 'A.D.';
                                }
                            ],
                            [
                                'attribute' => 'gender',
                                'label' =>   'लिङ्ग',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->gender;
                                }
                            ],
                            [
                                'attribute' => 'birth_type',
                                'label' =>   'जन्मको प्रकार',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->birth_type;
                                }
                            ],
                            [
                                'attribute' => 'helper',
                                'label' =>   'जन्मदाता',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->helper;
                                }
                            ],
                            [
                                'attribute' => 'birth_place',
                                'label' =>   'जन्मेिएको स्थान',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->birth_place;
                                }
                            ],
                            [
                                'attribute' => 'bith_country',
                                'label' =>   'जन्मिएको देश',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->bith_country;
                                }
                            ],

                        ],
                    ]) ?>
                </div>
                <div class="row">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' =>   function ($attribute, $index, $widget) {
                            if ($index === 0) {
                                return '<tr><th colspan="2" style="text-align:center">अभिभावकको विवरण</th></tr>';
                            }
                            return '<tr><th style="width:40%">' . $attribute['label'] . '</th><td style="width:60%">' . $attribute['value'] . '</td></tr>';
                        },
                        'attributes' => [
                            [
                                'attribute' => 'grandfather_fname',
                                'label' => '',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '';
                                },
                            ],

                            [
                                'attribute' => 'grandfather_fname',
                                'label' =>   'बाजेको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->grandfather_fname . ' ' . $model->grandfather_mname . ' ' . $model->grandfather_lname . ' / ' . $model->grandfather_fname_eng . ' ' . $model->grandfather_mname_eng . ' ' . $model->grandfather_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'father_fname',
                                'label' =>   'बाबुको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname . ' / ' . $model->father_fname_eng . ' ' . $model->father_mname_eng . ' ' . $model->father_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'father_ctz_no.',
                                'label' =>   'नागरिकता विवरण',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        Yii::$app->engToUni->convert($model->father_ctz_no) . ' / ' .
                                        Yii::$app->engToUni->convert($model->father_ctz_year) . '-'  .
                                        Yii::$app->engToUni->convert($model->father_ctz_month) . '-' .
                                        Yii::$app->engToUni->convert($model->father_ctz_day) . ' / ' . $model->father_ctz_district;
                                },
                            ],
                            [
                                'attribute' => 'father_ctz_no',
                                'label' =>   'Citizenship Details',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        $model->father_ctz_no . ' / ' .
                                        $model->ad_father_ctz_year . '-'  . $model->ad_father_ctz_month . '-' . $model->ad_father_ctz_day . ' / ' .
                                        Yii::$app->engDis->convert($model->father_ctz_district);
                                },
                            ],
                            [
                                'attribute' => 'father_permanent_address',
                                'label' =>   'स्थायी ठेगााना',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->father_permanent_address;
                                }
                            ],
                            [
                                'attribute' => 'mother_fname',
                                'label' =>   'आमाको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->mother_fname . ' ' . $model->mother_mname . ' ' . $model->mother_lname . ' / ' . $model->mother_fname_eng . ' ' . $model->mother_mname_eng . ' ' . $model->mother_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'mother_ctz_no.',
                                'label' =>   'नागरिकता विवरण',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        Yii::$app->engToUni->convert($model->mother_ctz_no) . ' / ' .
                                        Yii::$app->engToUni->convert($model->mother_ctz_year) . '-'  .
                                        Yii::$app->engToUni->convert($model->mother_ctz_month) . '-' .
                                        Yii::$app->engToUni->convert($model->mother_ctz_day) . ' / ' . $model->mother_ctz_district;
                                },
                            ],
                            [
                                'attribute' => 'mother_ctz_no.',
                                'label' =>   'Citizenship Details',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        $model->mother_ctz_no . ' / ' .
                                        $model->ad_mother_ctz_year . '-' . $model->ad_mother_ctz_month . '-' . $model->ad_mother_ctz_day . '/ ' .
                                        Yii::$app->engDis->convert($model->mother_ctz_district);
                                }
                            ],
                            [
                                'attribute' => 'mother_permanent_address',
                                'label' =>   'स्थायी ठेगााना',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->mother_permanent_address;
                                }
                            ],
                        ],
                    ]) ?>
                </div>
                <div class="row">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' =>   function ($attribute, $index, $widget) {
                            if ($index === 0) {
                                return '<tr><th colspan="2" style="text-align:center">सूचकको विवरण</th></tr>';
                            }
                            return '<tr><th style="width:40%">' . $attribute['label'] . '</th><td style="width:60%">' . $attribute['value'] . '</td></tr>';
                        },
                        'attributes' => [
                            [
                                'attribute' => 'informant_fname',
                                'label' => '',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '';
                                },
                            ],
                            [
                                'attribute' => 'informant_fname',
                                'label' =>   'सूचकको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->informant_fname . ' ' . $model->informant_mname . ' ' . $model->informant_lname . ' / ' . $model->inf_fname_eng . ' ' . $model->inf_mname_eng . ' ' . $model->inf_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'relation',
                                'label' =>   'शिशुसँगको नाता',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->relation;
                                }
                            ],
                            [
                                'attribute' => 'inf_ctz_no.',
                                'label' =>   'नागरिकता विवरण',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        Yii::$app->engToUni->convert($model->inf_ctz_no) . ' / ' .
                                        Yii::$app->engToUni->convert($model->inf_ctz_year) . '-'  .
                                        Yii::$app->engToUni->convert($model->inf_ctz_month) . '-' .
                                        Yii::$app->engToUni->convert($model->inf_ctz_day) . ' / ' . $model->inf_ctz_district;
                                },
                            ],
                            [
                                'attribute' => 'inf_ctz_no.',
                                'label' =>   'Citizenship Details',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        $model->inf_ctz_no . ' / ' . $model->ad_inf_ctz_year . '-' . $model->ad_inf_ctz_month . '-' . $model->ad_inf_ctz_day . '/ ' .
                                        Yii::$app->engDis->convert($model->inf_ctz_district);
                                }
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="birth-view col-sm-7">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><td style="width:100%;">{value}</td></tr>',
                    //'valueColOptions'=>['style'=>'width:70%'],
                    'attributes' => [
                        [
                            'attributes' => 'scanned_image',
                            'label' => '',
                            'value' => Yii::getAlias('@web/uploads') . '/' . $model->scanned_image,
                            'format' => ['image', ['class' => 'img-fluid']]
                        ],
                    ]
                ]) ?>

            </div>

        </div>
    </div>
    <div class="card-footer">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa far fa-hand-point-up"></i> Print', ['/birth/printpdf', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'target' => '_blank',
                'data-toggle' => 'tooltip',
                'title' => 'Will open the generated PDF file in a new window'
            ]);
            ?>

        </p>
    </div>
</div>