<?php

use app\models\Migrated;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\CustomPager;

/** @var yii\web\View $this */
/** @var app\models\MigratedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Migration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
  <div class="mig-index">
    <?php Pjax::begin(); ?>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-3">
          <?= Html::a('Create Migrated', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
          <?= Html::a('Export Data', ['mig/export'], ['class' => 'btn btn-primary btn-sm']) ?>
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
            'class' => 'table  table-bordered table-hover table-condensed  table-striped',
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
              'label' => 'ठेगाना',
              'attribute' => 'district',
              'value' => function ($model) {
                return $model->district . '-' . $model->local_level . '-' . $model->ward;
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
              'label' => 'बसाईसराई मिति(वि.स.)',
              'attribute' => 'migration_year',
              'value' => function ($model) {
                return $model->migration_year . '-' . $model->migration_month . '-' . $model->migration_day;
              }
            ],
            [
              'label' => 'सूचकको नाम',
              'attribute' => 'inf_fname',
              'value' => function ($model) {
                return $model->inf_fname . ' ' . $model->inf_mname . ' ' . $model->inf_lname;
              }
            ],
            [
              'attribute' => 'inf_birth_year',
              'label' =>   'जन्म मिति(वि.स.)',
              'value' => function ($model) {
                return $model->inf_birth_year . '-' . $model->inf_birth_month . '-' . $model->inf_birth_day;
              }
            ],

            [
              'label' => 'बसाई सरी जाने स्थान',
              'attribute' => 'going_district',
              'value' => function ($model) {
                return $model->going_district . '-' . $model->going_local_level . '-' . $model->going_ward;
              }
            ],
            [
              'label' => 'बसाई सरी आएको स्थान',
              'attribute' => 'coming_district',
              'value' => function ($model) {
                return $model->coming_district . '-' . $model->coming_local_level . '-' . $model->coming_ward;
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
            //     'urlCreator' => function ($action, Migrated $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //     }
            // ],
          ],
        ]); ?>
      </div>
    </div>
    <?php Pjax::end(); ?>

  </div>
</div>