<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Products;
use app\models\Atribut;

/* @var $this yii\web\View */
/* @var $model app\models\Value */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo $form->field($model, 'product_id')->textInput() ?>
    
    <?php // echo $form->field($model, 'atribut_id')->textInput() ?>
    
    <?= $form->field($model, 'product_id')->dropDownList(Products::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'atribut_id')->dropDownList(Atribut::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
