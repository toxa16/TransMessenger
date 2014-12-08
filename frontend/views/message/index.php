<?php
/* @var $this yii\web\View */
use Yii;
use common\models\User;
use yii\grid\GridView;

?>


<h1>Search Users</h1>

<?php
                
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'header' => 'User Name',
            'value' => function ($data) {
                $username = $data->username;
                $url = Yii::$app->urlManager->createUrl(['message/message', 'recipient' => $username]);
                return "<a href='".$url."'>".$username."</a>"; 
            },
            'enableSorting' => true,
            'format' => 'html',
        ],
        'language',
    ],
]);
