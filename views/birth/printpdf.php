<?php

use app\models\Birth;
use app\models\Registrar;
use app\models\District;
use app\models\Municipality;
use app\models\MotherTongue;
use app\models\Education;
use app\models\Helper;
use app\models\Gender;
use app\models\Religion;
use app\models\Ward;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<table class="table table-responsive">
    <colgroup>
        <col style="width: 90%;">
        <col style="width: 10%;">
    </colgroup>
    <!-- <tr>
        <td>Column 1</td>
        <td>Column 2</td>
    <tr>
        <th>hhh</th>
        <td><?= $model->p_district . '-' . $model->p_muni . '-' . $model->p_ward; ?></td>
    </tr> -->
    <!-- <tr>
            <th style=" width:40%">Hello</th>
            <td style="width:60%"><?= $model->reg_no; ?></td>
        </tr> -->
    <tr>
        <td>
            <img src="<?= Yii::getAlias('@web/uploads') . '/' . $model->scanned_image ?>">
        </td>
        <td>
            <img src="<?= Yii::getAlias('@web/uploads') . '/' . $model->scanned_image ?>">
        </td>
    </tr>
    </tbody>

</table>


<!-- <div class="">
    <table class=" table table-responsive col-sm-5">

        <tbody>
            <tr>
                <td>
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
                </td>
            </tr>
            <tr>
                <td>
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
                                    return $model->birth_year . '-' . $model->birth_month . '-' . $model->birth_day;
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
                </td>

            </tr>
            <tr>
                <td>
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
                                    return $model->father_ctz_no . ' / ' . $model->father_ctz_year . '-'  . $model->father_ctz_month . '-' . $model->father_ctz_day . ' / ' . $model->father_ctz_district;
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
                                    return $model->mother_ctz_no . ' / ' . $model->mother_ctz_year . '-' . $model->mother_ctz_month . '-' . $model->mother_ctz_day . '/ ' . $model->mother_ctz_district;
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
                </td>
            </tr>

        </tbody>
    </table>
    <table class="table table-responsive col-sm-7">
        <tbody>
            <tr>
                <td>
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
                </td>

            </tr>
        </tbody>
    </table>
</div> -->