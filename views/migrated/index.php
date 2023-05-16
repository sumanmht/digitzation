<?php

use app\models\Migrated;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\MigratedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Migrateds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">
    <div class="migrated-index">
        <p>
            <?= Html::a('Create Migrated', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table  table-bordered table-hover table-condensed table-responsive table-striped'],
            'options' => ['style' => 'font-size:12px;'],
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                    ['label' => 'दर्ता नं.',
                     'attribute' => 'reg_no',
                     'value' => function ($model) {                
                       return $model->reg_no;
                   }],
                   ['label' => 'दर्ता मिति(वि.स.)',
                     'attribute' => 'reg_year',
                     'value' => function ($model) {                
                     return $model->reg_year . '-' . $model->reg_month . '-' . $model->reg_day;
                   }],
                   ['label' => 'बसाईसराई मिति(वि.स.)',
                     'attribute' => 'migration_year',
                     'value' => function ($model) {                
                     return $model->migration_year . '-' . $model->migration_month . '-' . $model->migration_day;
                   }],
                   ['label' => 'सूचकको नाम',
                     'attribute' => 'inf_fname',
                     'value' => function ($model) {                
                     return $model->inf_fname . ' ' . $model->inf_mname . ' ' . $model->inf_lname;
                   }],
                   ['label' => 'बसाई सरी जाने स्थान',
                     'attribute' => 'going_district',
                     'value' => function ($model) {                
                     return $model->going_district . '-' . $model->going_local_level . '-' . $model->going_ward;
                   }],
                   ['label' => 'बसाई सरी आएको स्थान',
                     'attribute' => 'coming_district',
                     'value' => function ($model) {                
                     return $model->coming_district . '-' . $model->coming_local_level . '-' . $model->coming_ward;
                   }],
                   [
                    'class' => 'yii\grid\ActionColumn',
                    'options' => ['style' => 'width:100px;'],
                    'buttonOptions' => ['class' => 'btn btn-default'],
                    'template' => '<div class = "btn-group btn-group-sm text-center" role ="group">{view}{update}{delete}</div>' 
                ],

                
                // [
                //     'class' => ActionColumn::className(),
                //     'urlCreator' => function ($action, Migrated $model, $key, $index, $column) {
                //         return Url::toRoute([$action, 'id' => $model->id]);
                //     }
                // ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>

        </div>
    </div>
</div>

