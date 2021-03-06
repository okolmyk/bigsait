<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Markets;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MarketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Markets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="markets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Markets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
          //  'name',
           // 'avatar',
           
           [
				'attribute' => 'name',
				'value' => 'name',
				'filter' => Markets::find()->select(['name', 'id'])->indexBy('name')->column(),
				
           ],
           
           [
				'label' => 'avatar',
				'format' => 'raw',
				'value' => function($data){
					return Html::img(Url::toRoute('photo-markets/'.$data->avatar),[
						'alt'=>'картинка',
						'style' => 'width:50px;'
						]);
					},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
