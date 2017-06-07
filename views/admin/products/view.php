<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
           [
				'label' => 'Id Category',
				'value' => $model->idCategory->name,
           ],
           [
				'label' => 'Id Markets',
				'value' => $model->idMarkets->name,	
           ],
           [
				'label' => 'Sex Category',
				'value' => $model->sex_category,
           ],
           [
				'label' => 'Pictures name file on Data Base',
				'value' => $model->pictures,
           ], 
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
        ],
    ]) ?>

</div>
