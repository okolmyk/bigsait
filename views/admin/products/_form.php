<?php

use app\models\Markets;
use app\models\CategoryProducts;
use app\models\SizeProducts;
use app\models\Size;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UploadForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'id_category')->dropDownList(CategoryProducts::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>

	<?= $form->field($model, 'id_markets')->dropDownList(Markets::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>

	<?= $form->field($model, 'sex_category')->DropDownList(['Мужской' => 'Мужской', 'Женский' => 'Женский']) ?>

    <?php // echo $form->field($model, 'pictures')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'imageFile')->fileInput(); ?>

	<?= Html::checkboxList('size', ArrayHelper::getColumn(SizeProducts::find()->where(['product_id'=>$model->id])->all(), 'size_id'), ArrayHelper::map(Size::find()->all() , 'id', 'name'), ['separator'=>'<br>']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
