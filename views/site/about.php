<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sobre mí';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Hola, soy Luis Casanova, recién egresado de ingenieria en computación, si tienes alguna duda o comentario no dudes en contactarme. Te dejo
        mi cuenta de <?= Html::a('GitHub', 'https://github.com/casanova94')?> y <?= Html::a('Youtube', 'https://www.youtube.com/channel/UCPMFdD0Vnwod2wNzLaa2mfw')?> para que veas un poco de mi trabajo. Saludos!
    </p>

   <!-- <code><?= __FILE__ ?></code>-->
</div>
