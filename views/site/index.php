<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */

$this->title = 'Big Sait Repit';
?>
<div class="site-index">
  
  <div class="jumbotron">
      <?php
      	echo ListView::widget([
        			'dataProvider' => $dataProvider,
              'itemView' => 'list_index',
              'layout' => "<div>{summary}</div><div class='row'>{items}</div><div>{pager}</div>",
              'summary' => '<div class="my-summary">Показано {count} из {totalCount}</div>',
              'options' => [
                  'tag' => 'div',
                  'class' => 'container',
                ],
              'itemOptions' => [
                  'tag' => 'div',
                  'class' => 'col-xs-3 col-sm-3 col-md-3 col-lg-3 my-cl',
                ],
            ]);
      	?>
  </div>

  </div>
<!-- </div> -->
