<?php
use app\models\Birth;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\BirthSearch;
$this->title = 'Dashboard';
//$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    
    <?php $this->head() ?>
</head>
<body class=" hold-transition side-mini">
<?php $this->beginBody() ?>
    <div class="wrapper">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>No. of Entries</h6>
                            <h6>Birth: <?= $birth->fname. '' .$birth->lname ?></h6>
                            <h6>Marriage: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.2</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.3</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.4</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.5</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.6</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
        </div>   
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.7</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.8</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.9</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.10</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.11</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.12</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
        </div> 
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.13</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.14</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.15</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Ward No.16</div>
                    <div class="card-body">
                        <?php //foreach ($births as $birth): ?>
                            <h6>V.D.C.: <?= $birthCount ?></h6>
                            
                    </div>
                    <?php // endforeach; ?>
                </div> 
            </div>

        </div>    
    </div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage() ?>
