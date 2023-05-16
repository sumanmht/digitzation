<?php

use app\models\FamilyMember;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\FamilyMemberSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Family Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-member-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Family Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'inf_id',
            'member_fname',
            'member_mname',
            'member_lname',
            //'birth_year',
            //'birth_month',
            //'birth_day',
            //'mem_gender',
            //'mem_birth_place',
            //'relation_with_inf',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FamilyMember $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
