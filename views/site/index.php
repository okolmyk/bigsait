<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */

$this->title = 'Big Sait Repit';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Главная страница</h1>

        <p class="lead">Моего проекта</p>
        
		  <div class="list_obr"> 
			<?php
			
			echo ListView::widget([
					'dataProvider' => $dataProvider,
					'itemView' => 'list_index',
				]);

				
				//var_dump(Yii::$app->user->identity->userGroup);
				//echo Yii::$app->user->getId();
				//echo Yii::$app->user->getIsGuest();
			
			?>
   
		</div>
		
    </div>

    <div class="body-content">

       
        </div>

    </div>
</div>
