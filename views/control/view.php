<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Control */

$this->title = $model->control_id;
$this->params['breadcrumbs'][] = ['label' => 'Controls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->control_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->control_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'control_id',
            ['value'=>$model->cliente->nombre." ".$model->cliente->apellido,
            'label' => 'Cliente'],
            'peso',
            'medida_cintura',
            'fecha_control',
        ],
    ]) ?>

</div>
