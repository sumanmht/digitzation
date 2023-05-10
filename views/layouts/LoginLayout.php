<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\LoginAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
//use app\assets\FontAsset;

//FontAsset::register($this);

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<body class="login-page" style="background:lightgrey;">
    <?php $this->beginBody() ?>
    <div class="wrap">
        
            <div class="card-body">
                <div class="container col-md-4">
                    <?= $content ?>
                </div>
            </div>
            <!-- <div class="card-footer"></div> -->
       
    </div>
   <!--  <footer class="footer">
        <div class="container"></div>
    </footer> -->
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
