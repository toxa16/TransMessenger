<?php
/**
 * Respoke Connect Asset
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @since 2.0
 */
class RespokeConnectAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/respoke.min.js',
        'js/respoke.connect.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
