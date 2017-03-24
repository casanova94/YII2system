<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Modalidad */

$this->title = $model->tipo_id;
$this->params['breadcrumbs'][] = ['label' => 'Modalidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modalidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tipo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tipo_id], [
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
            'tipo_id',
            'tipo',
            'tarifa',
        ],
    ]) ?>

</div>
