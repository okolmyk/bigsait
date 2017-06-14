<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

?>
	
		 
	<h2><?= Html::a($model->name, Url::to(['/admin/products/view/', 'id' => $model->id])) ?></h2>
	   
	<h5><?= Html::a('Доп - '.$model->name, Url::to(['/admin/products/productsone/', 'id' => $model->id])) ?></h5>   
	  
	<?= Html::a($model->idCategory->name, Url::to(['/admin/category-products/view/', 'id' => $model->idCategory->id])) ?> </br> 
	
	<?php if($model->sex_category === 'Мужской') { ?>
	
	<?= Html::a($model->sex_category, Url::to(['/admin/man/', 'id' => $model->idMarkets->id])) ?>  
	
	<?php } ?>
	
	<?php if($model->sex_category === 'Женский') { ?>
	
	<?= Html::a($model->sex_category, Url::to(['/admin/woman/', 'id' => $model->idMarkets->id])) ?>  
	
	<?php } ?>	
		
	<?php // echo Html::encode($model->sex_category) ?>  </br>  
		
	<div class="my_photo"> <?= Html::a(Html::img('/photo/'.$model->pictures), Url::to(['/admin/products/view/', 'id' => $model->id])) ?> </div> </br> 

	


