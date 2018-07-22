<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Size;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SizeProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Size Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="size-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Size Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           // 'product_id',
           //'size_id',
           'productName',
            /*[
        				'attribute' => 'product_id',
        				'value' => 'product.name',
        				'filter' => Products::find()->select(['name', 'id'])->indexBy('id')->column(),
            ],*/

            [
        				'attribute' => 'size_id',
        				'value' => 'size.name',
        				'filter' => Size::find()->select(['name', 'id'])->indexBy('id')->column(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
