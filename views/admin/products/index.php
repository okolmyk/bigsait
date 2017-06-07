<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Markets;
use app\models\Products;
use app\models\search\ProductsSearch;
use app\models\CategoryProducts;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'id',
           // 'name',
            [
				'attribute' => 'name',
				'value' => 'name',	
				'filter' => Products::find()->select(['name', 'id'])->indexBy('name')->column(),
            ],
           // 'id_category',
           // 'id_markets',
           
            [
				'attribute' => 'id category',
				'value' => 'idCategory.name',
				'filter' => CategoryProducts::find()->select(['name', 'id'])->indexBy('id')->column(), 	
			],
			
            [
				'attribute' => 'id markets',
				'value' => 'idMarkets.name',
			],
           // 'sex_category',
            [
				'attribute' => 'Sex categoty',
				'value' => 'sex_category',
				'filter' => Products::find()->select(['sex_category', 'id'])->indexBy('sex_category')->column(),
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
