<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SizeProducts */

$this->title = 'Update Size Products: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Size Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'size_id' => $model->size_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="size-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
