<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

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
            'alias',
            'login',
            'password',
            'username',
            'auth_key',
            'access_token',
            'userGroup',
            'avatar',
            [
				'label' => 'Avatar',
				'format' => 'raw',
				'value' => function($data){
					return Html::img(Url::toRoute('photo-users/'.$data->avatar),[
						'alt'=>'картинка',
						'style' => 'width:70px;'
						]);
					},
           ],
        ],
    ]) ?>

</div>
