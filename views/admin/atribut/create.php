<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atribut */

$this->title = 'Create Atribut';
$this->params['breadcrumbs'][] = ['label' => 'Atributs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atribut-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
