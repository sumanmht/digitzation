<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/another.css',
    ];
    public $js = [
        'js/birth/birthradio.js',
        'js/birth/birthBsToAd.js',
        'js/birth/birth.js',
        'js/nepa.js',

        'js/marriage/marriageBsToAd.js',
        'js/marriage/marriage.js',
        'js/image.js',
        'js/migration/migBsToAd.js',
        'js/unicodejs.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
