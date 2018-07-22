<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use app\models\Products;

?>

<div class="product-item">

    <!-- <h2>Здравствуйте <?= Html::a($model->login, Url::to(['/admin/users/view/', 'id' => $model->id])) ?></h2>

     <?= Html::a($model->email, Url::to(['/admin/users/view/', 'id' => $model->id])) ?> <br>

     <?= Html::a($model->password, Url::to(['/admin/users/view/', 'id' => $model->id])) ?> <br>

     <div class="user-avatar"><?= Html::img('/photo-users/'.$model->avatar) ?> </div>

    <h4>Вы - <?= HtmlPurifier::process($model->userGroup) ?></h4>
-->

<div class="container">
  <ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#home" role="tab" data-toggle="tab">Привет</a></li>
    <li><a href="#profile" role="tab" data-toggle="tab">Мой профиль</a></li>
    <li><a href="#message" role="tab" data-toggle="tab">Мои вещи</a></li>
    <li><a href="#settings" role="tab" data-toggle="tab">Настройки</a></li>
  </ul>
  <div class="tab-content">

    <div role="tabpanel" class="tab-pane active fade in" id="home">
      <h2>Здравствуйте <?= Html::a($model->login, Url::to(['/admin/users/view/', 'id' => $model->id])) ?></h2>
      <h4>Вы - <?= HtmlPurifier::process($model->userGroup) ?></h4>
    </div>

    <div role="tabpanel" class="tab-pane fade" id="profile">
      <div class="user-avatar"><?= Html::img('/photo-users/'.$model->avatar) ?> </div>
      <h4>Логин - <?= Html::a($model->login, Url::to(['/admin/users/view/', 'id' => $model->id])) ?></h4>
      <h4>Email - <?= Html::a($model->email, Url::to(['/admin/users/view/', 'id' => $model->id])) ?></h4>
      <h4>Пароль - <?= Html::a($model->password, Url::to(['/admin/users/view/', 'id' => $model->id])) ?></h4>
      <h4>Роль - <?= HtmlPurifier::process($model->userGroup) ?></h4>
    </div>

    <div role="tabpanel" class="tab-pane fade" id="message">
      <?= Html::tag('div', Html::encode($model->login), ['class' => 'mytestclass mytestclass22222', 'id' => 'mytestid']) ?>
       <?php
        for($i = 0; $i < count($model->products); $i++){
          echo '<div class="my_photo">'.Html::tag('div', Html::img('/photo/'.$model->products[$i]['pictures']), ['class' => 'col-xs-3 col-sm-3 col-md-3 col-lg-3 my_cl']).'</div>';
        }
      ?> 
      <!-- <div class="user-avatar"><?= Html::img('/photo/'.$model->products[1]['pictures']) ?> </div>
      <div class="user-avatar"><?= Html::img('/photo/'.$model->products[0]['pictures']) ?> </div> -->
    </div>

    <div role="tabpanel" class="tab-pane fade" id="settings">Вкладка настройки</div>

  </div>
</div>



</div>
