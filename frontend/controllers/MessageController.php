<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Session;

class MessageController extends \yii\web\Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $session = Yii::$app->session;
            if (!$session->isActive) {
                $session->open();
            }
            Yii::$app->language = $session['language'];
            $session->close();
            return true;
        } else {
            return false;
        }
    }
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where('id != '.Yii::$app->user->getId()),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
    
    public function actionMessage($recipient)
    {
        if (!$user = User::find()->where(['username' => $recipient])->one()) {
            $this->redirect(Yii::$app->homeUrl);
        }
        
        return $this->render('message', ['recipient' => $recipient, 'userLanguage' => $user->language]);
    }

}
