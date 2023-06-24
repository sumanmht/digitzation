<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Death $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Deaths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="death-view col-sm-5">

                <!-- <h1><?= Html::encode($this->title) ?></h1> -->

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
                                'attribute' => 'district',
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
                                    return $model->district . '-' . $model->local_level . '-' . $model->ward;
                                }

                            ],
                            [
                                'attribute' => 'reg_no',
                                'label' =>   'दर्ता नं.',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        Yii::$app->engToUni->convert($model->reg_no) . ' / ' .
                                        $model->reg_no;
                                },
                            ],
                            [
                                'attribute' => 'reg_year',
                                'label' =>   'दर्ता मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स. ' . Yii::$app->engToUni->convert($model->reg_year) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_month) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_day) . ' / ' .
                                        $model->ad_reg_year . '-' . $model->ad_reg_month . '-' . $model->ad_reg_day . ' A.D.';
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
                                return '<tr><th colspan="2" style="text-align:center">मृतकको विवरण</th></tr>';
                            }
                            return '<tr><th style="width:40%">' . $attribute['label'] . '</th><td style="width:60%">' . $attribute['value'] . '</td></tr>';
                        },
                        'attributes' => [
                            [
                                'attribute' => 'inf_fname',
                                'label' => '',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '';
                                },
                            ],
                            [
                                'attribute' => 'fname',
                                'label' =>   'मृतकको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->fname . ' ' . $model->mname . ' ' . $model->lname . ' / ' .
                                        $model->fname_eng . ' ' . $model->mname_eng . ' ' . $model->lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'birth_year',
                                'label' =>   'जन्म मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स. ' . Yii::$app->engToUni->convert($model->birth_year) . '-' .
                                        Yii::$app->engToUni->convert($model->birth_month) . '-' .
                                        Yii::$app->engToUni->convert($model->birth_day) . ' / ' .
                                        $model->ad_birth_year . '-' . $model->ad_birth_month . '-' . $model->ad_birth_day . ' A.D.';
                                }
                            ],
                            [
                                'attribute' => 'death_year',
                                'label' =>   'मृत्यु मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स. ' . Yii::$app->engToUni->convert($model->death_year) . '-' .
                                        Yii::$app->engToUni->convert($model->death_month) . '-' .
                                        Yii::$app->engToUni->convert($model->death_day) . ' / ' .
                                        $model->ad_death_year . '-' . $model->ad_death_month . '-' . $model->ad_death_day . ' A.D.';;
                                }
                            ],
                            [
                                'attribute' => 'ctz_no.',
                                'label' =>   'नागरिकता विवरण',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return Yii::$app->engToUni->convert($model->ctz_no) . ' / ' .
                                        'वि.स.' . $model->ctz_year . '-' . $model->ctz_month . '-' . $model->ctz_day . ' / ' .
                                        $model->ctz_district;
                                }
                            ],
                            [
                                'attribute' => 'ctz_no.',
                                'label' =>   'Citizenship Details',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->ctz_no . ' / ' .
                                        $model->ad_ctz_year . '-' . $model->ad_ctz_month . '-' . $model->ad_ctz_day . ' A.D.' . ' / ' .
                                        Yii::$app->engDis->convert($model->ctz_district);
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
                                'attribute' => 'grandfather_fname',
                                'label' =>   'बाजेको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->grand_fname . ' ' . $model->grand_mname . ' ' . $model->grand_lname . ' / ' .
                                        $model->grand_fname_eng . ' ' . $model->grand_mname_eng . ' ' . $model->grand_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'father_fname',
                                'label' =>   'बाबुको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname . ' / ' .
                                        $model->father_fname_eng . ' ' . $model->father_mname_eng . ' ' . $model->father_lname_eng;
                                }
                            ],

                            [
                                'attribute' => 'spouse_fname',
                                'label' =>   'पति/पत्नीको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->spouse_fname . ' ' . $model->spouse_mname . ' ' . $model->spouse_lname . ' / ' .
                                        $model->spouse_fname_eng . ' ' . $model->spouse_mname_eng . ' ' . $model->spouse_lname_eng;
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
                                'attribute' => 'inf_fname',
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
                                    return $model->inf_fname . ' ' . $model->inf_mname . ' ' . $model->inf_lname . ' / ' .
                                        $model->inf_fname_eng . ' ' . $model->inf_mname_eng . ' ' . $model->inf_lname_eng;
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
                                        'वि.स.' . Yii::$app->engToUni->convert($model->inf_ctz_year) . '-'  .
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
                                        $model->inf_ctz_no . ' / ' . $model->ad_inf_ctz_year . '-' . $model->ad_inf_ctz_month . '-' . $model->ad_inf_ctz_day . ' A.D.' . '/ ' .
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
                            'attributes' => 'd_scanned_image',
                            'label' => '',
                            'value' => Yii::getAlias('@web/uploads') . '/' . $model->d_scanned_image,
                            'format' => ['image', ['class' => 'img-fluid full-screen-image']]
                        ],
                    ]
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
</div>