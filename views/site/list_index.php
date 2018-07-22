<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

?>
  <!-- <div class="testing"></div> -->

<div class='my-cl2'>

	<!-- <?= Html::a($model->name, Url::to(['/admin/products/view/', 'id' => $model->id])) ?>

	<div id="info_id" onclick="myFunction('<?= $model->id ?>')"><?php echo $model->id; ?></div>

	<h5><?= Html::a('Доп - '.$model->name, Url::to(['/admin/products/productsone/', 'id' => $model->id])) ?></h5>

	<?= Html::a($model->idCategory->name, Url::to(['/admin/category-products/view/', 'id' => $model->idCategory->id])) ?> </br>

	<?php if($model->sex_category === 'Мужской') { ?>

	<?= Html::a($model->sex_category, Url::to(['/admin/man/'])) ?>

	<?php } ?>

	<?php if($model->sex_category === 'Женский') { ?>

	<?= Html::a($model->sex_category, Url::to(['/admin/woman/'])) ?>

	<?php
		}
	?> -->

	<!-- <div class="my_photo"><?= Html::a(Html::img('/photo/'.$model->pictures, ['class' => '']), Url::to(['/admin/products/view/', 'id' => $model->id])) ?></div> -->

	<div class="my_photo"><?= Html::a(Html::img('/photo/'.$model->pictures, ['class' => '']), Url::to(['/admin/products/productsone/', 'id' => $model->id])) ?></div>
	<!-- <div id="info_id"><?php echo $model->id; ?></div> -->

	</div>

	<div class="my_button_cover">
		<div class="my_button_one">
			+
		</div>
		<div class="my_button_two" name="<?php echo $model->id; ?>">
			save <?php echo $model->id; ?>
		</div>
	</div>
