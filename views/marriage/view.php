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
            <div class="marriage-view col-sm-6">

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
                                    return $model->district . '-' . $model->local_level . '-' . $model->ward;
                                }

                            ],
                            [
                                'attribute' => 'reg_no',
                                'label' =>   'दर्ता नं.',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return Yii::$app->engToUni->convert($model->reg_no) . ' / ' .
                                        $model->reg_no;
                                },
                            ],
                            [
                                'attribute' => 'reg_year',
                                'label' =>   'दर्ता मिति',
                                'value' => function ($model) {
                                    return
                                        'वि.स.' . ' ' . Yii::$app->engToUni->convert($model->reg_year) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_month) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_day) . ' / ' .
                                        $model->ad_reg_year . '-' . $model->ad_reg_month . '-' . $model->ad_reg_day . ' ' . 'A.D.';
                                }
                            ],
                            [
                                'attribute' => 'marriage_year',
                                'label' =>   'विवाह मिति(वि.स.)',
                                'value' => function ($model) {
                                    return
                                        'वि.स.' . ' ' . Yii::$app->engToUni->convert($model->marriage_year) . '-' .
                                        Yii::$app->engToUni->convert($model->marriage_month) . '-' .
                                        Yii::$app->engToUni->convert($model->marriage_day) . ' / ' .
                                        $model->ad_marriage_year . '-' . $model->ad_marriage_month . '-' . $model->ad_marriage_day . ' ' . 'A.D.';
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
                        'template' => function ($attribute, $index, $widget) {
                            if ($index === 0) {
                                return '<tr><th></th><th>दुलहा</th><th>दुलही</th></tr>';
                            }
                            $groomValue = $attribute['value1']($widget->model);
                            $brideValue = $attribute['value2']($widget->model);
                            return '<tr><th>' . $attribute['label'] . '</th><td>' . $groomValue . '</td><td>' . $brideValue . '</td></tr>';
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
                                'label' => 'नाम',
                                'value1' => function ($model) {
                                    return $model->groom_fname . ' ' . $model->groom_mname . ' ' . $model->groom_lname . ' / ' .
                                        $model->groom_fname_eng . ' ' . $model->groom_mname_eng . ' ' . $model->groom_lname_eng;
                                },
                                'value2' => function ($model) {
                                    return $model->bride_fname . ' ' . $model->bride_mname . ' ' . $model->bride_lname . ' / ' .
                                        $model->bride_fname_eng . ' ' . $model->bride_mname_eng . ' ' . $model->bride_lname_eng;
                                },
                            ],
                            [
                                'attribute' => 'g_birth_year',
                                'label' =>   'जन्म मिति',
                                'value1' => function ($model) {
                                    return
                                        'वि.स.' . ' ' . Yii::$app->engToUni->convert($model->g_birth_year) . '-' .
                                        Yii::$app->engToUni->convert($model->g_birth_month) . '-' .
                                        Yii::$app->engToUni->convert($model->g_birth_day) . ' / ' .
                                        $model->ad_g_birth_year . '-' . $model->ad_g_birth_month . '-' . $model->ad_g_birth_day . ' ' . 'A.D.';
                                },
                                'value2' => function ($model) {
                                    return
                                        'वि.स.' . ' ' . Yii::$app->engToUni->convert($model->b_birth_year) . '-' .
                                        Yii::$app->engToUni->convert($model->b_birth_month) . '-' .
                                        Yii::$app->engToUni->convert($model->b_birth_day) . ' / ' .
                                        $model->ad_b_birth_year . '-' . $model->ad_b_birth_month . '-' . $model->ad_b_birth_day . ' ' . 'A.D.';
                                }
                            ],
                            [
                                'attribute' => 'g_grand_fname',
                                'label' =>   'बाजेको नाम',
                                'value1' => function ($model) {
                                    return $model->g_grand_fname . ' ' . $model->g_grand_mname . ' ' . $model->g_grand_lname . ' / ' .
                                        $model->g_grand_fname_eng . ' ' . $model->g_grand_mname_eng . ' ' . $model->g_grand_lname_eng;
                                },
                                'value2' => function ($model) {
                                    return $model->b_grand_fname . ' ' . $model->b_grand_mname . ' ' . $model->b_grand_lname . ' / ' .
                                        $model->b_grand_fname_eng . ' ' . $model->b_grand_mname_eng . ' ' . $model->b_grand_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'g_father_fname',
                                'label' =>   'बाबुको नाम',
                                'value1' => function ($model) {
                                    return $model->g_father_fname . ' ' . $model->g_father_mname . ' ' . $model->g_father_lname . ' / ' .
                                        $model->g_father_fname_eng . ' ' . $model->g_father_mname_eng . ' ' . $model->g_father_lname_eng;
                                },
                                'value2' => function ($model) {
                                    return $model->b_father_fname . ' ' . $model->b_father_mname . ' ' . $model->b_father_lname . ' / ' .
                                        $model->b_father_fname_eng . ' ' . $model->b_father_mname_eng . ' ' . $model->b_father_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'g_ctz_no',
                                'label' =>   'नागरिकता विवरण',
                                'value1' => function ($model) {
                                    return
                                        Yii::$app->engToUni->convert($model->g_ctz_no) .  ' / ' .
                                        'वि.स.' . Yii::$app->engToUni->convert($model->g_ctz_year) . '-'  .
                                        Yii::$app->engToUni->convert($model->g_ctz_month) . '-' .
                                        Yii::$app->engToUni->convert($model->g_ctz_day) . ' / ' . $model->g_ctz_district;
                                },
                                'value2' => function ($model) {
                                    return Yii::$app->engToUni->convert($model->b_ctz_no) . ' / ' .
                                        'वि.स.' . Yii::$app->engToUni->convert($model->b_ctz_year) . '-'  .
                                        Yii::$app->engToUni->convert($model->b_ctz_month) . '-' .
                                        Yii::$app->engToUni->convert($model->b_ctz_day) . ' / ' . $model->b_ctz_district;
                                },
                            ],
                            [
                                'attribute' => 'g_ctz_no',
                                'label' =>   'Citizenship Details',
                                'value1' => function ($model) {
                                    return
                                        $model->g_ctz_no . ' / ' .
                                        $model->ad_g_ctz_year . '-'  . $model->ad_g_ctz_month . '-' . $model->ad_g_ctz_day . ' A.D.' . ' / ' .
                                        Yii::$app->engDis->convert($model->g_ctz_district);
                                },
                                'value2' => function ($model) {
                                    return
                                        $model->b_ctz_no . ' / ' . $model->ad_b_ctz_year . '-'  . $model->ad_b_ctz_month . '-' . $model->ad_b_ctz_day . ' A.D.' . ' / ' .
                                        Yii::$app->engDis->convert($model->b_ctz_district);
                                },
                            ],
                            [
                                'attribute' => 'g_place_of_birth',
                                'label' =>   'जन्मस्थान',
                                'value1' => function ($model) {
                                    return $model->g_place_of_birth;
                                },
                                'value2' => function ($model) {
                                    return $model->b_place_of_birth;
                                },
                            ],
                            [
                                'attribute' => 'g_permanent_address',
                                'label' =>   'स्थायी ठेगाना',
                                'value1' => function ($model) {
                                    return $model->g_permanent_address;
                                },
                                'value2' => function ($model) {
                                    return $model->b_permanent_address;
                                },
                            ],
                            [
                                'attribute' => 'g_religiion',
                                'label' =>   'धर्म',
                                'value1' => function ($model) {
                                    return $model->g_religion;
                                },
                                'value2' => function ($model) {
                                    return $model->b_religion;
                                },
                            ],
                            [
                                'attribute' => 'g_education',
                                'label' =>   'शैक्षिक योग्यता',
                                'value1' => function ($model) {
                                    return $model->g_education;
                                },
                                'value2' => function ($model) {
                                    return $model->b_education;
                                },
                            ],
                            [
                                'attribute' => 'g_mother_tongue',
                                'label' =>   'मातृभाषा',
                                'value1' => function ($model) {
                                    return $model->g_mother_tongue;
                                },
                                'value2' => function ($model) {
                                    return $model->b_mother_tongue;
                                },
                            ],
                            [
                                'attribute' => 'g_prev_marital_status',
                                'label' =>   'पूर्व वैवाहिक स्थिति',
                                'value1' => function ($model) {
                                    return $model->g_prev_marital_status;
                                },
                                'value2' => function ($model) {
                                    return $model->b_prev_marital_status;
                                },
                            ],
                            // Add more attributes here as needed
                        ],
                    ]) ?>


                </div>

            </div>
            <div class="birth-view col-sm-6">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><td style="width:100%;">{value}</td></tr>',
                    //'valueColOptions'=>['style'=>'width:70%'],
                    'attributes' => [
                        [
                            'attributes' => 'ma_scanned_image',
                            'label' => '',
                            'value' => Yii::getAlias('@web/uploads') . '/' . $model->ma_scanned_image,
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