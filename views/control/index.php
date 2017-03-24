<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ControlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Controles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear control', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'control_id',
            ['attribute'=> 'cliente_id',
             'label' => 'Nombre',
            'value' => function($model)
            {
                # code...
                return $model->cliente->nombre." ".$model->cliente->apellido;
            }],
            'peso',
            'medida_cintura',
            'fecha_control',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
