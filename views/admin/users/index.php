<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Products;
use app\models\Users;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'login',
            'password',
            'email',
            'auth_key',
            'userGroup',
            [
      				'label' => 'avatar',
      				'format' => 'raw',
      				'value' => function($data){
      					return Html::img(Url::toRoute('photo-users/'.$data->avatar),[
      						'alt'=>'картинка',
      						'style' => 'width:50px;'
      						]);
      					},
            ],

            [
      				'attribute' => 'product_id',
      				//'filter' => Products::find()->select(['name', 'id'])->indexBy('id')->column(),
      				'value' => function (Users $users){
					               return implode(', ', ArrayHelper::map($users->products, 'id', 'name'));
				               }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
