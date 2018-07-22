<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
use app\models\Products;
?>

<div class="jumbotron">
  <?php
    echo ListView::widget([
     'dataProvider' => $dataProvider,
     'itemView' => 'mypage_list',
     
   ]);
  ?>
</div>
