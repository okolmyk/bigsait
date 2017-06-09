<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Products;
use app\models\Size;

/* @var $this yii\web\View */
/* @var $model app\models\SizeProducts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="size-products-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<?= $form->field($model, 'product_id')->dropDownList(Products::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>  

	<?= $form->field($model, 'size_id')->dropDownList(Size::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
