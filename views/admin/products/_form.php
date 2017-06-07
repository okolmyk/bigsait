<?php

use app\models\Markets;
use app\models\CategoryProducts;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UploadForm;
use yii\web\UploadedFile;

?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
	<?= $form->field($model, 'id_category')->dropDownList(CategoryProducts::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>
   
	<?= $form->field($model, 'id_markets')->dropDownList(Markets::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>  

	<?= $form->field($model, 'sex_category')->DropDownList(['Мужской' => 'Мужской', 'Женский' => 'Женский']) ?>

    <?php // echo $form->field($model, 'pictures')->textInput(['maxlength' => true]) ?>
    
	<?= $form->field($model, 'imageFile')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
