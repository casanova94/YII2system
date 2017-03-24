<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Clientes;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Control */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="control-form">

 <?php   $sql = 'SELECT cliente_id,CONCAT(nombre," ",apellido) nombre FROM clientes';
$clientes = Clientes::findBySql($sql)->all();
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cliente_id')->dropdownList(
        ArrayHelper::map($clientes, 'cliente_id', 'nombre'),
    ['prompt'=>'Selecionar socio']) ?>

    <?= $form->field($model, 'peso')->textInput() ?>

    <?= $form->field($model, 'medida_cintura')->textInput() ?>

    <?= $form->field($model, 'fecha_control')->widget(DatePicker::classname(), [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
