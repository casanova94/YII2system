<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pago',
            ['attribute'=>'id_cliente',
            'label' => 'Socio',
            'value' => function($model)
            {
                # code...
                return $model->cliente->nombre." ".$model->cliente->apellido;
            }],
            'monto',
            'estado',
            'fecha_pago',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
