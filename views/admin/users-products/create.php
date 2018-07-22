<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsersProducts */

$this->title = 'Create Users Products';
$this->params['breadcrumbs'][] = ['label' => 'Users Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
