<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Markets;
use app\models\Size;
use app\models\SizeProducts;
use app\models\Products;
use app\models\CategoryProducts;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
           // 'name',
           // 'id_category',
           // 'id_markets',
           // 'sex_category',
           
            [
				'attribute' => 'name',
				'value' => 'name',	
				'filter' => Products::find()->select(['name', 'id'])->indexBy('name')->column(),
            ],
           
           
            [
				'attribute' => 'id_category',
				'value' => 'idCategory.name',
				'filter' => CategoryProducts::find()->select(['name', 'id'])->indexBy('id')->column(), 	
			],
			
            [
				'attribute' => 'id_markets',
				'value' => 'idMarkets.name',
				'filter' => Markets::find()->select(['name', 'id'])->indexBy('id')->column(),
			],
           
            [
				'attribute' => 'sex_category',
				'value' => 'sex_category',
				'filter' => Products::find()->select(['sex_category', 'id'])->indexBy('sex_category')->column(),
            ],
            
            [
				'attribute' => 'size_id',
				'filter' => Size::find()->select(['name', 'id'])->indexBy('id')->column(),
				'value' => function (Products $products){
					return implode(', ', ArrayHelper::map($products->size, 'id', 'name'));
				} 
            ],
            
            'pictures',
            [
				'label' => 'Pictures',
				'format' => 'raw',
				'value' => function($data){
					return Html::img(Url::toRoute('photo/'.$data->pictures),[
						'alt'=>'картинка',
						'style' => 'width:70px;'
						]);
					},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
