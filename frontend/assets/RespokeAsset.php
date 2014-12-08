<?php
/**
 * Respoke Asset
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @since 2.0
 */
class RespokeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/messenger.css',
    ];
    public $js = [
        'js/respoke.message.js'
        
    ];
    public $depends = [
        'frontend\assets\RespokeConnectAsset',
    ];
}
