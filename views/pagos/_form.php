<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\Clientes;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-form">

    <?php $form = ActiveForm::begin(); ?>

 <?php   $sql = 'SELECT cliente_id,CONCAT(nombre," ",apellido) nombre FROM clientes';
//$clientes = Clientes::findBySql($sql)->all();

$clientes = (new \yii\db\Query())
    ->select(['c.cliente_id','CONCAT(c.nombre," ",c.apellido," (",m.tarifa,")") nombre', 'm.tarifa'])
    ->from('clientes c')->join('INNER JOIN', 'modalidad m', 'm.tipo_id = c.tipo_id')
    ->all();
?>

    <?= $form->field($model, 'id_cliente')->dropdownList(
        ArrayHelper::map($clientes, 'cliente_id', 'nombre'),
    ['prompt'=>'Selecionar socio'])->label("Socio") ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true])->dropdownList(
        ['Pagado'=>'Pagado',
        'Pendiente'=>'Pendiente'],
    ['prompt'=>'Selecionar estado']) ?>

    <?= $form->field($model, 'fecha_pago')->widget(DatePicker::classname(), [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
