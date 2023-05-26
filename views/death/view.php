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
                        'options' => ['style' => 'font-size:13px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' => '<tr><th style="width:40%; border: 1px solid black;">{label}</th><td style="width:60%; border: 1px solid black;">{value}</td></tr>',
                        'attributes' => [
                            [
                                'attribute' => 'p_district',
                                'label' =>   'ठेगाना',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->district . ' ' . $model->local_level . '' . $model->ward;
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
                                'label' =>   'दर्ता मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->reg_year . '-' . $model->reg_month . '-' . $model->reg_day;
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
                        'options' => ['style' => 'font-size:13px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' => '<tr><th style="width:40%; border: 1px solid black;">{label}</th><td style="width:60%; border: 1px solid black;">{value}</td></tr>',
                        'attributes' => [
                            [
                                'attribute' => 'fname',
                                'label' =>   'मृतकको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->fname . ' ' . $model->mname . ' ' . $model->lname;
                                }
                            ],
                            [
                                'attribute' => 'birth_year',
                                'label' =>   'जन्म मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->birth_year . '-' . $model->birth_month . '-' . $model->birth_day;
                                }
                            ],
                            [
                                'attribute' => 'death_year',
                                'label' =>   'मृत्यु मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->death_year . '-' . $model->death_month . '-' . $model->death_day;
                                }
                            ],
                            [
                                'attribute' => 'ctz_no.',
                                'label' =>   'नागरिकता विवरण',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->ctz_no . ' / ' . $model->ctz_year . '-' . $model->ctz_month . '-' . $model->ctz_day . '/ ' . $model->ctz_district;
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
                                    return $model->grand_fname . ' ' . $model->grand_mname . ' ' . $model->grand_lname;
                                }
                            ],
                            [
                                'attribute' => 'father_fname',
                                'label' =>   'बाबुको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->father_fname . ' ' . $model->father_mname . ' ' . $model->father_lname;
                                }
                            ],

                            [
                                'attribute' => 'spouse_fname',
                                'label' =>   'पति/पत्नीको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->spouse_fname . ' ' . $model->spouse_mname . ' ' . $model->spouse_lname;
                                }
                            ],
                            [
                                'attribute' => 'inf_fname',
                                'label' =>   'सूचकको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->inf_fname . ' ' . $model->inf_mname . ' ' . $model->inf_lname;
                                }
                            ],
                            [
                                'attribute' => 'inf_ctz_no.',
                                'label' =>   'नागरिकता विवरण',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->inf_ctz_no . ' / ' . $model->inf_ctz_year . '-' . $model->inf_ctz_month . '-' . $model->inf_ctz_day . '/ ' . $model->inf_ctz_district;
                                }
                            ],

                            // [
                            //     'attribute' => 'relation',
                            //     'label' =>   'शिशुसँगको नाता',
                            //     'value' => function ($form, $widget) {
                            //         $model = $widget->model;
                            //         return $model->relation;
                            //     }
                            // ],

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