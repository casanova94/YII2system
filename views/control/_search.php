<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ControlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="control-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'control_id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'peso') ?>

    <?= $form->field($model, 'medida_cintura') ?>

    <?= $form->field($model, 'fecha_control') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
