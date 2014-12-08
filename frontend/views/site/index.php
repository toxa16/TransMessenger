<?php
/* @var $this yii\web\View */
$this->title = 'TransMessenger';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to TransMessenger!</h1>

        <p class="lead">This is an app which allows you to chat with people who don't know your language neither you don't know theirs. 
        The TransMessenger will automatically translate messages for you! </p>
        <p class="lead"><b>Here you are able to talk in 3 languages!</b></p>

        <p><a class="btn btn-lg btn-success" href="<?= \Yii::$app->urlManager->createUrl('message/index') ?>">Find people</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>#English</h2>

                <p>I DO speak English!</p>

            </div>
            <div class="col-lg-4">
                <h2>#Spanish</h2>

                <p>¡Yo SÍ hablo español!</p>

            </div>
            <div class="col-lg-4">
                <h2>#French</h2>

                <p>Je parle français!</p>

            </div>
        </div>

    </div>
</div>
