<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Products;

?>



	<div class="my_photo"> <?= Html::a(Html::img('/photo/'.$model->pictures), Url::to(['/admin/products/productsone/', 'id' => $model->id])) ?> </div> </br>
