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
<html lang="<?= Yii::$app->language ?>">

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
                    <div class="card-header"><b><center>Ward No. 1</center></b></div>
                    <div class="card-body">
                        
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth1 ?></h6>
                        <h6>Marriage: <?= $marriage1 ?></h6>
                        <h6>Death: <?= $death1 ?></h6>
                        <h6>Migration: <?= $migration1 ?></h6>
                        <h6>Divorce: <?= $divorce1 ?></h6>
                        
                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 2</center></b></div>
                    <div class="card-body">
                        
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth2 ?></h6>
                        <h6>Marriage: <?= $marriage2 ?></h6>
                        <h6>Death: <?= $death2 ?></h6>
                        <h6>Migration: <?= $migration2 ?></h6>
                        <h6>Divorce: <?= $divorce2 ?></h6>

                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 3</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth3 ?></h6>
                        <h6>Marriage: <?= $marriage3 ?></h6>
                        <h6>Death: <?= $death3 ?></h6>
                        <h6>Migration: <?= $migration3 ?></h6>
                        <h6>Divorce: <?= $divorce3 ?></h6>


                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 4</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth4 ?></h6>
                        <h6>Marriage: <?= $marriage4 ?></h6>
                        <h6>Death: <?= $death4 ?></h6>
                        <h6>Migration: <?= $migration4 ?></h6>
                        <h6>Divorce: <?= $divorce4 ?></h6>


                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 5</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth5 ?></h6>
                        <h6>Marriage: <?= $marriage5 ?></h6>
                        <h6>Death: <?= $death5 ?></h6>
                        <h6>Migration: <?= $migration5 ?></h6>
                        <h6>Divorce: <?= $divorce5 ?></h6>


                    </div>
                                    </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 6</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth6 ?></h6>
                        <h6>Marriage: <?= $marriage6 ?></h6>
                        <h6>Death: <?= $death6 ?></h6>
                        <h6>Migration: <?= $migration6 ?></h6>
                        <h6>Divorce: <?= $divorce6 ?></h6>


                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 7</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth7 ?></h6>
                        <h6>Marriage: <?= $marriage7 ?></h6>
                        <h6>Death: <?= $death7 ?></h6>
                        <h6>Migration: <?= $migration7 ?></h6>
                        <h6>Divorce: <?= $divorce7 ?></h6>


                    </div>
                   
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 8</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth8 ?></h6>
                        <h6>Marriage: <?= $marriage8 ?></h6>
                        <h6>Death: <?= $death8 ?></h6>
                        <h6>Migration: <?= $migration8 ?></h6>
                        <h6>Divorce: <?= $divorce8 ?></h6>


                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 9</center></b></div>
                    <div class="card-body">
                       <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth9 ?></h6>
                        <h6>Marriage: <?= $marriage9 ?></h6>
                        <h6>Death: <?= $death9 ?></h6>
                        <h6>Migration: <?= $migration9 ?></h6>
                        <h6>Divorce: <?= $divorce9 ?></h6>

                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 10</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth10 ?></h6>
                        <h6>Marriage: <?= $marriage10 ?></h6>
                        <h6>Death: <?= $death10 ?></h6>
                        <h6>Migration: <?= $migration10 ?></h6>
                        <h6>Divorce: <?= $divorce10 ?></h6>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 11</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth11 ?></h6>
                        <h6>Marriage: <?= $marriage11 ?></h6>
                        <h6>Death: <?= $death11 ?></h6>
                        <h6>Migration: <?= $migration11 ?></h6>
                        <h6>Divorce: <?= $divorce11 ?></h6>

                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 12</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth12 ?></h6>
                        <h6>Marriage: <?= $marriage12 ?></h6>
                        <h6>Death: <?= $death12 ?></h6>
                        <h6>Migration: <?= $migration12 ?></h6>
                        <h6>Divorce: <?= $divorce12 ?></h6>

                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 13</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth13 ?></h6>
                        <h6>Marriage: <?= $marriage13 ?></h6>
                        <h6>Death: <?= $death13 ?></h6>
                        <h6>Migration: <?= $migration13 ?></h6>
                        <h6>Divorce: <?= $divorce13 ?></h6>

                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 14</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth14 ?></h6>
                        <h6>Marriage: <?= $marriage14 ?></h6>
                        <h6>Death: <?= $death14 ?></h6>
                        <h6>Migration: <?= $migration14 ?></h6>
                        <h6>Divorce: <?= $divorce14 ?></h6>

                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 15</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth15 ?></h6>
                        <h6>Marriage: <?= $marriage15 ?></h6>
                        <h6>Death: <?= $death15 ?></h6>
                        <h6>Migration: <?= $migration15 ?></h6>
                        <h6>Divorce: <?= $divorce15 ?></h6>

                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header"><b><center>Ward No. 16</center></b></div>
                    <div class="card-body">
                        <h6>No. of Entries</h6>
                        <h6>Birth: <?= $birth16 ?></h6>
                        <h6>Marriage: <?= $marriage16 ?></h6>
                        <h6>Death: <?= $death16 ?></h6>
                        <h6>Migration: <?= $migration16 ?></h6>
                        <h6>Divorce: <?= $divorce16 ?></h6>

                    </div>
                   
                </div>
            </div>

        </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>