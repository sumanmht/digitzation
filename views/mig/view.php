<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Mig $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Migs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="mig-view col-sm-6">

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
                                'attribute' => 'district',
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
                                    return $model->reg_no;
                                },
                            ],
                            [
                                'attribute' => 'reg_year',
                                'label' =>   'दर्ता मिति',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स.' . Yii::$app->engToUni->convert($model->reg_year) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_month) . '-' .
                                        Yii::$app->engToUni->convert($model->reg_day) . ' / ' .
                                        $model->ad_reg_year . '-' . $model->ad_reg_month . '-' . $model->ad_reg_day . ' A.D.';
                                }
                            ],
                            [
                                'attribute' => 'migration_year',
                                'label' =>   'बसाईसराई मिति',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स.' . Yii::$app->engToUni->convert($model->migration_year) . '-' .
                                        Yii::$app->engToUni->convert($model->migration_month) . '-' .
                                        Yii::$app->engToUni->convert($model->migration_day) . ' / ' .
                                        $model->ad_migration_year . '-' . $model->ad_migration_month . '-' . $model->ad_migration_day . ' A.D.';
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
                                'attribute' => 'inf_fname',
                                'label' =>   'सुचकको नाम',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->inf_fname . ' ' . $model->inf_mname . ' ' . $model->inf_lname . ' / ' .
                                        $model->inf_fname_eng . ' ' . $model->inf_mname_eng . ' ' . $model->inf_lname_eng;
                                }
                            ],
                            [
                                'attribute' => 'inf_birth_year',
                                'label' =>   'जन्म मिति',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return
                                        'वि.स.' . Yii::$app->engToUni->convert($model->inf_birth_year) . '-' .
                                        Yii::$app->engToUni->convert($model->inf_birth_month) . '-' .
                                        Yii::$app->engToUni->convert($model->inf_birth_day) . ' / ' .
                                        $model->ad_inf_birth_year . '-' . $model->ad_inf_birth_month . '-' . $model->ad_inf_birth_day . ' A.D.';
                                }
                            ],
                            [
                                'attribute' => 'inf_gender',
                                'label' =>   'लिङ्ग',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->inf_gender;
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
                                        Yii::$app->engToUni->convert($model->inf_ctz_day) . ' / ' .
                                        $model->inf_ctz_district;
                                },
                            ],
                            [
                                'attribute' => 'inf_ctz_no.',
                                'label' =>   'Citizenship Details',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->inf_ctz_no . ' / ' . $model->inf_ctz_year . '-'  . $model->inf_ctz_month . '-' . $model->inf_ctz_day . ' / ' .
                                        Yii::$app->engDis->convert($model->inf_ctz_district);
                                },
                            ],

                            [
                                'attribute' => 'going_district',
                                'label' =>   'बसाई सरी गएको ठेगाना',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->going_district . ' ' . $model->going_local_level . ' ' . $model->going_ward;
                                }
                            ],
                            [
                                'attribute' => 'coming_district',
                                'label' =>   'बसाई सरी आएको ठेगाना',
                                'value' => function ($form, $widget) {
                                    $model = $widget->model;
                                    return $model->coming_district . ' ' . $model->coming_local_level . ' ' . $model->coming_ward;
                                }
                            ],
                        ],
                    ]) ?>
                </div>



            </div>
            <div class="mig-view col-sm-6">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><td style="width:100%;">{value}</td></tr>',
                    //'valueColOptions'=>['style'=>'width:70%'],
                    'attributes' => [
                        [
                            'attributes' => 'm_scanned_image',
                            'label' => '',
                            'value' => Yii::getAlias('@web/uploads') . '/' . $model->m_scanned_image,
                            'format' => ['image', ['class' => 'img-fluid full-screen-image']]
                        ],
                    ]
                ]) ?>

            </div>

        </div>
        <div class="row">
            <?= DetailView::widget([
                'model' => $fams,
                'options' => ['style' => 'font-size:12px;', 'class' => 'table table-bordered table-hover table-condensed '],
                'template' => '<tr><th style="text-align:center;">सदस्यहरु</th></tr><tr><td style="width:100%; ">{value}</td></tr>',
                'attributes' => [

                    [
                        'attribute' => 'mem_fname',
                        'label' => 'hhh',
                        'value' => function ($fams) {
                            $html = '<table class="table table-bordered">';
                            $html .= '<thead>';
                            $html .= '<tr>';
                            $html .= '<th>क्र.स.</th>';
                            $html .= '<th>नाम</th>';
                            $html .= '<th>जन्म मिति</th>';
                            $html .= '<th>नागरिकता विवरण</th>';
                            $html .= '<th>Citizenship Details</th>';
                            // $html .= '<th>जारी जिल्ला</th>';
                            $html .= '<th>लिङ्ग</th>';
                            $html .= '<th>सुचकसँको नाता</th>';
                            $html .= '</tr>';
                            $html .= '</thead>';
                            $html .= '<tbody>';
                            $serialNumber = 1;
                            foreach ($fams as $data) {
                                $html .= '<tr>';
                                $html .= '<td>' . Yii::$app->engToUni->convert($serialNumber++) . '</td>';
                                $html .= '<td>' . $data['mem_fname'] . ' ' . $data['mem_mname'] . ' ' . $data['mem_lname'] . ' / ' .
                                    $data['mem_fname_eng'] . ' ' . $data['mem_mname_eng'] . ' ' . $data['mem_lname_eng'] . '</td>';
                                $html .= '<td>' . 'वि.स. ' . $data['birth_year'] . '-' . $data['birth_month'] . '-' . $data['birth_day'] . ' / ' .
                                    $data['ad_birth_year'] . '-' . $data['ad_birth_month'] . '-' . $data['ad_birth_day'] . ' A.D.' . '</td>';
                                $html .= '<td>' . Yii::$app->engToUni->convert($data['mem_ctz_no']) . ' / ' .
                                    'वि.स. ' . Yii::$app->engToUni->convert($data['mem_ctz_year']) . '-' .
                                    Yii::$app->engToUni->convert($data['mem_ctz_month']) . '-' .
                                    Yii::$app->engToUni->convert($data['mem_ctz_day']) . ' / ' .
                                    $data['mem_ctz_district'] . '</td>';
                                $html .= '<td>' . $data['mem_ctz_no'] . ' / ' . $data['ad_mem_ctz_year'] . '-' .
                                    $data['ad_mem_ctz_month'] . '-' . $data['ad_mem_ctz_day'] . ' A.D.' . ' / ' .
                                    Yii::$app->engDis->convert($data['mem_ctz_district']) . '</td>';
                                $html .= '<td>' . $data['mem_gender'] . '</td>';
                                $html .= '<td>' . $data['relation_with_inf'] . '</td>';
                                $html .= '</tr>';
                            }
                            $html .= '</tbody>';
                            $html .= '</table>';
                            return $html;
                        },
                        'format' => 'html',
                    ],

                ],
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