<?php
/* @var $this yii\web\View */
use common\models\User;
use frontend\assets\RespokeAsset;

$this->params['breadcrumbs'][] = $recipient;

RespokeAsset::register($this);
?>


<div id="message_view">
    <h1><?= $recipient ?>&nbsp;<span>(<?= $userLanguage ?>)</span></h1>
    
    
    <input id="remoteId" type="hidden" value="<?= $recipient ?>" />
    <input id="userLanguage" type="hidden" value="<?= $userLanguage ?>" />

    <div id="messaging">
	    <ul id="messages" class="form-control"></ul><br />
	    Write message:<br />
	    <textarea id="textToSend" rows="2" class="form-control"></textarea><br />
	    <input class="btn btn-success" id='sendMessage' type='button' value='Send &amp; Translate' />
	    <input class="btn btn-default" id='sendOriginal' type='button' value='Send Original Message' />
    </div>
</div>
