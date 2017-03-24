<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modalidad */

$this->title = 'Actualizar modalidad: ' . $model->tipo_id;
$this->params['breadcrumbs'][] = ['label' => 'Modalidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_id, 'url' => ['view', 'id' => $model->tipo_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="modalidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
