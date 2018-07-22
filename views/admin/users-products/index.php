<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UsersProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            [
              'attribute' => 'user_id',
              'value' => 'user.login'
            ],
            //'product_id',
            [
              'attribute' => 'product_id',
              'value' => 'product.name'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
