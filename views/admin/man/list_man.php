<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<div class='my-cl2'>
  <!-- <h2><?= Html::a($model->name, Url::to(['/admin/products/view/', 'id' => $model->id])) ?></h2>

	<h2><?= Html::a('Доп - '.$model->name, Url::to(['/admin/products/productsone/', 'id' => $model->id])) ?></h2>

	<?= Html::a($model->idCategory->name, Url::to(['/admin/category-products/view/', 'id' => $model->idCategory->id])) ?> </br>

	<?= Html::encode($model->sex_category) ?>  </br> -->

	<!-- <div class="my_photo"> <?= Html::a(Html::img('/photo/'.$model->pictures), Url::to(['/admin/products/view/', 'id' => $model->id])) ?> </div> </br> -->

	<div class="my_photo"><?= Html::a(Html::img('/photo/'.$model->pictures, ['class' => '']), Url::to(['/admin/products/productsone/', 'id' => $model->id])) ?></div>

</div>

<div class="my_button_cover">
	<div class="my_button_one">
		+
	</div>
	<div class="my_button_two">
		save
	</div>
</div>
