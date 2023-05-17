<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/nepalitrad.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/radiobtn.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class=" hold-transition side-mini">
<?php $this->beginBody() ?>
    <div class="wrapper">
        
        <!-- Main Sidebar Container -->
        <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>
        <!-- Navbar -->
        <?= $this->render('navbar') ?>
        <!-- /.navbar -->   

        <!-- Content Wrapper. Contains page content -->
        <?= $this->render('content', ['content' => $content]) ?>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
       
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
