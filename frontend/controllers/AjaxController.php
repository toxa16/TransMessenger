<?php

namespace frontend\controllers;

use Yii;
use common\models\User;

class AjaxController extends \yii\web\Controller {
    
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            return Yii::$app->request->isAjax;
        } else {
            return false;
        }
    }
    
    public function actionConnect() {
        if ($id = Yii::$app->user->getId()) {
            $resource = $this->getToken();
            echo $resource['tokenId'];
        }
    }
    
    private function getToken() {
        $username = User::findOne(Yii::$app->user->id)->username;
        $arg = [
            'appId' => '9fd60cdf-05f0-434c-803f-6ba8196226b4',
            'endpointId' => $username,
            'ttl' => 3600, //1 hour
        ];
        
        //$url = "https://api.respoke.io/v1/tokens";
        $apitools_url = "https://c50420ed-86abc1c42681.my.apitools.com";
        $ch = curl_init($apitools_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json", 
            "App-Secret: e01182ea-a1fe-48b3-a796-d93cbb548fcb"]);
        $json = json_encode($arg);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result, true);
    }
    
    public function actionTranslate($source, $target, $q) {
        $arg_array = [
            'user_key' => 'bb6948e307ae1ea1a1506a6ced00d5eb',
            'q' => $q,
            'source' => $source,
            'target' => $target
        ];
        
        $arg = http_build_query($arg_array, '', '&');
        
        //$url = "https://api.lingo24.com/mt/v1/translate";
        $apitools_url = "https://5517ba9d-86abc1c42681.my.apitools.com/";
        $ch = curl_init($apitools_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arg);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        echo $result;
    }
    
    public function actionSpell($text) {
        //$url = "https://montanaflynn-spellcheck.p.mashape.com/check/";
        $apitools_url = "https://c199859b-86abc1c42681.my.apitools.com/";
        $arg = str_replace(" ", "+", trim($text));
        
        $ch = curl_init($apitools_url."?text=".$arg);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [ "X-Mashape-Key: A94CXB5QHkmshGxLifXLD2HhNzF2p1BYvVBjsniz7tzckLRUSF" ]);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        echo $result;
    }
}