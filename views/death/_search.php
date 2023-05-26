<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DeathSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php Pjax::begin(); ?>
<div class="death-search" style="float:right;">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
            'class' => 'form-inline', // Add 'form-inline' class for inline form display
        ],
    ]); ?>
    <div class="row form-group">
        <div class="col">
            <?= $form->field($model, 'deathsearch')->label('')->textInput(['placeholder' => 'Search', 'class'=>'form-control form-control-sm'])->label(false) ?>
        </div>
        <div class="col-auto">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>

        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end(); ?>
