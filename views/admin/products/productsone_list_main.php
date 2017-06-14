<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Products;

?>
	
	<div class="my_description_text_cover">
		 
	<h2><?= Html::a($model->name, Url::to(['/admin/products/view/', 'id' => $model->id])) ?></h2>
	  
	<h3><?= Html::a($model->idCategory->name, Url::to(['/admin/category-products/view/', 'id' => $model->idCategory->id])) ?></h3>    
	
	<h3><?= Html::a($model->idMarkets->name, Url::to(['/admin/markets/view/', 'id' => $model->idMarkets->id])) ?></h3>    
		
	<?php if($model->sex_category === 'Мужской') { ?>
	
	<h3><?= Html::a($model->sex_category, Url::to(['/admin/man/', 'id' => $model->idMarkets->id])) ?></h3>   
	
	<?php } ?>
	
	<?php if($model->sex_category === 'Женский') { ?>
	
	<h3><?= Html::a($model->sex_category, Url::to(['/admin/woman/', 'id' => $model->idMarkets->id])) ?></h3>   
	
	<?php } ?>

	</div> 
	
	<div class="my_photo_cover">
	
	<div class="my_photo_main"> <?= Html::a(Html::img('/photo/'.$model->pictures), Url::to(['/admin/products/view/', 'id' => $model->id])) ?> </div> </br> 

	</div>
	
	
	
	<div class="midle_border"></div>  

