<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
   <?php $this->registerLinkTag([
    'title' => 'Gym System',
    'rel' => 'Shortcut Icon',
    'type' => 'image/x-icon',
    'href' => 'images/favicon.ico',
]);?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Gym System',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Sobre mí', 'url' => ['/site/about'],'visible'=>Yii::$app->user->isGuest],
           // ['label' => 'Socios', 'url' => ['/clientes/index']],
            //['label' => 'Pagos', 'url' => ['/pagos/index']],
            //['label' => 'Controles', 'url' => ['/control/index']],
            //['label' => 'Modalidades', 'url' => ['/modalidad/index']],
                ['label' => 'Contacto', 'url' => ['/site/contact'],'visible'=>Yii::$app->user->isGuest],
               ['label' => 'Opciones', 'items' => [
                '<li class="dropdown-header">Administrar socios</li>',
                 ['label' => 'Socios', 'url' => ['/clientes/index']],
                 '<li class="divider"></li>',

                 '<li class="dropdown-header">Administrar pagos</li>',
                 ['label' => 'Pagos', 'url' => ['/pagos/index']],
                 '<li class="divider"></li>',

                 '<li class="dropdown-header">Administrar controles</li>',
                 ['label' => 'Control', 'url' => ['/control/index']],
                 '<li class="divider"></li>',

                 '<li class="dropdown-header">Administrar modalidades</li>',
                 ['label' => 'Modalidad', 'url' => ['/modalidad/index']],
                 '<li class="divider"></li>',

                 '<li class="dropdown-header">Administrar usuarios del sistema</li>',
               ['label' => 'Usuarios', 'url' => ['/yii-user/index']],
               ],'visible'=>!(Yii::$app->user->isGuest)],
              
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; El gimnasio <?= date('Y') ?></p>

       <!--  <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
