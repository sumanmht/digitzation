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
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4 fixed-left" style="position: fixed;" style="font-family: Dosis;">
    <!-- Brand Logo -->
    <a href="site/index" class="brand-link">
        <!-- <img  class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <strong>
            <h4 class="brand-text font-weight-light" style="text-align: center; font-family: Dosis;">DIGITIZATION</h4>
        </strong>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img  class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">

            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav'],
                        'items' => [
                            [
                                'label' => '<i class="bi bi-people-fill"></i> Birth',
                                'encode' => false, // This is important to render the HTML code for the icon
                                'url' => ['birth/index']
                            ],
                            ['label' => 'Birth', 'class' => 'fa-solid fa-user fa-bounce', 'url' => ['birth/index']],
                            ['label' => 'Death', 'icon' => 'fa-solid fa-bed', 'url' => ['death/index']],
                            ['label' => 'Marriage', 'icon' => 'bi bi-people-fill', 'url' => ['marriage/index']],
                            ['label' => 'Migration', 'icon' => 'fas fa-envelope', 'url' => ['mig/index']],
                            ['label' => 'Divorce', 'icon' => 'bi bi-heartbreak-fill', 'url' => ['divorce/index']],
                            //['label' => 'Gender', 'icon' => 'th', 'url' => ['gender/index']],
                        ],

                    ]);
                    ?> -->
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    ['label' => 'Birth', 'icon' => 'fa-solid fa-user fa-bounce', 'url' => ['birth/index']],
                    ['label' => 'Death', 'icon' => 'fa-solid fa-bed', 'url' => ['death/index']],
                    ['label' => 'Marriage', 'icon' => 'bi bi-people-fill', 'url' => ['marriage/index']],
                    ['label' => 'Migration', 'icon' => 'fas fa-envelope', 'url' => ['mig/index']],
                    ['label' => 'Divorce', 'icon' => 'bi bi-heartbreak-fill', 'url' => ['divorce/index']],
                    //['label' => 'Gender', 'icon' => 'th', 'url' => ['gender/index']],

                ],
            ]);
            ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>