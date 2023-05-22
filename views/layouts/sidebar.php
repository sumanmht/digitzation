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

<aside class="main-sidebar sidebar-dark-primary elevation-4 fixed-left" style="position: fixed;" >
    <!-- Brand Logo -->
    <a href="site/index" class="brand-link">
        <!-- <img  class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <strong><h4 class="brand-text font-weight-light" style="text-align: center;">DIGITIZATION</h4></strong>
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

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    // [
                    //     'label' => 'Starter Pages',
                    //     'icon' => 'tachometer-alt',
                    //     'badge' => '<span class="right badge badge-info">2</span>',
                    //     'items' => [
                    //         ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                    //         ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                    //     ]
                    // ],
                    ['label' => 'Birth', 'icon' => 'th', 'url' => ['birth/index']],
                    ['label' => 'Death', 'icon' => 'th', 'url' => ['index']],
                    ['label' => 'Marriage', 'icon' => 'th', 'url' => ['index']],
                    ['label' => 'Migration', 'icon' => 'th', 'url' => ['mig/index']],
                    ['label' => 'Member', 'icon' => 'th', 'url' => ['fam/index']],
                    //['label' => 'Gender', 'icon' => 'th', 'url' => ['gender/index']],
                    
                ],
            ]);
            ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    
</aside>