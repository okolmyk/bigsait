<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SizeProducts */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Size Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="size-products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product_id' => $model->product_id, 'size_id' => $model->size_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'product_id' => $model->product_id, 'size_id' => $model->size_id], [
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
            'product_id',
            'size_id',
        ],
    ]) ?>

</div>
