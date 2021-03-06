<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Size;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SizeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sizes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="size-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Size', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'name',
            
            [
				'attribute' => 'name',
				'value' => 'name',
				'filter' => Size::find()->select(['name', 'id'])->indexBy('name')->column(),
	
            ],
            
           /* [
				'label' => 'products count size',
				'value' => 'products_count_size',
            ],*/

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
