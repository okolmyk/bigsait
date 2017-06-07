<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CategoryProducts */

$this->title = 'Create Category Products';
$this->params['breadcrumbs'][] = ['label' => 'Category Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
