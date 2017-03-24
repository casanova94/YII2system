<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YiiUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yii-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true])->label("Nombre") ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true])->label("Apellido") ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label("Usuario") ?>

    <?= $form->field($model, 'password')->passwordInput()->label("Contraseña") ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
