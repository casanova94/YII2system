<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Socios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo socio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cliente_id',
            ['attribute'=>'tipo_id',
            'label' => 'Modalidad',
            'value' => 'tipo.tipo'],
            'nombre',
            'apellido',
            //'edad',
            ['attribute'=>'fecha_inscripcion',
            'label'=>'Fecha de inscripción'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
