<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */

$this->title = 'Update Yii User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Yii Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yii-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
