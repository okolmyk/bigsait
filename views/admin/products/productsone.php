<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Products;

/* @var $this yii\web\View */

$this->title = 'Big Sait Repit';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1></h1>

        <p class="lead"></p>       

		<?= ListView::widget([
					'dataProvider' => $data1,
					'itemView' => 'productsone_list_main',
					'itemOptions' => [
						'tag' => 'div',
						'class' => 'main_products',
					], 
				]);
	
		?>
		<?= ListView::widget([
					'dataProvider' => $data2,
					'itemView' => 'productsone_list_additional',
					'itemOptions' => [
						'tag' => 'div',
						'class' => 'dop_products',
					], 
				]);
		?>

	
		
    </div>

    <div class="body-content">

       
        </div>

    </div>
</div>
