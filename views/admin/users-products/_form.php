<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $model app\models\UsersProducts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'product_id')->textInput() ?> -->

    <?= $form->field($model, 'user_id')->dropDownList(Users::find()->select(['login', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'product_id')->dropDownList(Products::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
