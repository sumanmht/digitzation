<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Marriage $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Marriages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$datarows = '
<tr>
    <th style="width:30%; ">{label}</th>
    <td style="width:35%; ">{value}</td>
    <td style="width:35%; ">{value}</td>
</tr>
';
$headerrows = '<tr>
<th ></th>
<th >दुलहा</th>
<th >दुलही</th>
</tr>';

?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="marriage-view col-sm-5">

                <!-- <h1><?= Html::encode($this->title) ?></h1> -->
                <div class="row">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' => '<tr><th style="width:40%;">{label}</th><td style="width:60%; ">{value}</td></tr>',
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
                        'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed '],
                        'template' => '<tr><th style="width:40%; ">{label}</th><td style="width:60%; ">{value}</td></tr>',
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
                                'attribute' => 'marriage_year',
                                'label' =>   'विवाह मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->marriage_year . '-' . $model->marriage_month . '-' . $model->marriage_day;
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
                        'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed'],
                        'template' =>   function ($attribute, $index, $widget) {
                            if ($index === 0) {
                                return '<tr><th></th><th>दुलहा</th><th>दुलही</th></tr>';
                            }
                            return '<tr><th>' . $attribute['label'] . '</th><td>' . $attribute['value'] . '</td><td>' . $attribute['value'] . '</td></tr>';
                        },
                        'attributes' => [
                            [
                                'attribute' => 'groom_fname',
                                'label' => '',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '';
                                },
                            ],

                            [
                                'attribute' => 'groom_fname',
                                'label' =>   'नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->groom_fname . ' ' . $model->groom_mname . ' ' . $model->groom_lname;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->bride_fname . ' ' . $model->bride_mname . ' ' . $model->bride_lname;
                                }
                            ],
                            [
                                'attribute' => 'g_birth_year',
                                'label' =>   'जन्म मिति(वि.स.)',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_birth_year . '-' . $model->g_birth_month . '-' . $model->g_birth_day;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_birth_year . '-' . $model->b_birth_month . '-' . $model->b_birth_day;
                                }
                            ],

                            [
                                'attribute' => 'g_grand_fname',
                                'label' =>   'बाजेको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_grand_fname . ' ' . $model->g_grand_mname . ' ' . $model->g_grand_lname;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_grand_fname . ' ' . $model->b_grand_mname . ' ' . $model->b_grand_lname;
                                }
                            ],
                            [
                                'attribute' => 'g_father_fname',
                                'label' =>   'बाबुको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_father_fname . ' ' . $model->g_father_mname . ' ' . $model->g_father_lname;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_father_fname . ' ' . $model->b_father_mname . ' ' . $model->b_father_lname;
                                }
                            ],
                            [
                                'attribute' => 'g_ctz_no',
                                'label' =>   'नागरिकता विवरण',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_ctz_no . ' / ' . $model->g_ctz_year . '-'  . $model->g_ctz_month . '-' . $model->g_ctz_day . ' / ' . $model->g_ctz_district;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_ctz_no . ' / ' . $model->b_ctz_year . '-'  . $model->b_ctz_month . '-' . $model->b_ctz_day . ' / ' . $model->b_ctz_district;
                                },
                            ],
                            [
                                'attribute' => 'g_place_of_birth',
                                'label' =>   'जन्मस्थान',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_place_of_birth;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_place_of_birth;
                                },
                            ],
                            [
                                'attribute' => 'g_permanent_address',
                                'label' =>   'स्थायी ठेगाना',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_permanent_address;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_permanent_address;
                                },
                            ],
                            [
                                'attribute' => 'g_religon',
                                'label' =>   'धर्म',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_religon;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_religion;
                                },
                            ],
                            [
                                'attribute' => 'g_education',
                                'label' =>   'शैक्षिक योग्यता',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_education;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_education;
                                },
                            ],
                            [
                                'attribute' => 'g_mother_tongure',
                                'label' =>   'मातृभाषा',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_mother_tongure;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_mother_tongue;
                                },
                            ],
                            [
                                'attribute' => 'g_prev_marital_status',
                                'label' =>   'धर्म',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->g_prev_marital_status;
                                },
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->b_prev_marital_status;
                                },
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
                            'attributes' => 'ma_scanned_image',
                            'label' => '',
                            'value' => Yii::getAlias('@web/uploads') . '/' . $model->ma_scanned_image,
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