<?php

use yii\helpers\Html;
use yii\helpersArrayHelper;
use yii\grid\GridView;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Value', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'product_id',

            'productName',

            /*[
      				'attribute' => 'product_id',
      				'value' => 'product.name',
            ],*/

            'atributName',

            /*[
      				'attribute' => 'atribut_id',
      				'value' => 'atribut.name',
            ],*/

            //'atribut_id',
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
