<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\Markets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="markets-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'imageFile')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
