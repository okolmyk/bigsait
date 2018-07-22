<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    if(Yii::$app->user->isGuest){
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],

      			['label' =>  'Товары', 'items' => [

      					['label' =>  'Мужчинам', 'url' => ['/admin/man/']],

      					['label' =>  'Женщинам', 'url' => ['/admin/woman/']],
      			]],

            ['label' => 'Registration', 'url' => ['/admin/users/registration']],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/admin/users/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
  }
  if(!Yii::$app->user->isGuest && Yii::$app->user->identity->userGroup !== 'admin'){
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],

            ['label' => 'Моя страница', 'url' => ['/admin/users/mypage']],

      			['label' =>  'Товары', 'items' => [

      					['label' =>  'Мужчинам', 'url' => ['/admin/man/']],

      					['label' =>  'Женщинам', 'url' => ['/admin/woman/']],
      			]],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/admin/users/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
  }

  if(!Yii::$app->user->isGuest && Yii::$app->user->identity->userGroup === 'admin'){
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],

            ['label' => 'Моя страница', 'url' => ['/admin/users/mypage']],

            ['label' =>  'Админ меню', 'items' => [

    					['label' =>  'Категории продуктов', 'url' => ['/admin/category-products/']],

    					['label' =>  'Магазины', 'url' => ['/admin/markets/']],

    					['label' =>  'Продукты', 'url' => ['/admin/products/']],

    					['label' =>  'Юзеры', 'url' => ['/admin/users/']],

    					['label' =>  'Размеры', 'url' => ['/admin/size/']],

    					['label' =>  'Размеры продуктов', 'url' => ['/admin/size-products/']],

              ['label' =>  'Юзеры и продукты', 'url' => ['/admin/users-products/']],

    					['label' =>  'Атрибуты', 'url' => ['/admin/atribut/']],

    					['label' =>  'Дополнительные свойства', 'url' => ['/admin/value/']],

			]],

			['label' =>  'Товары', 'items' => [

					['label' =>  'Мужчинам', 'url' => ['/admin/man/']],

					['label' =>  'Женщинам', 'url' => ['/admin/woman/']],
			]],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/admin/users/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
  }
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Big Sait Repit <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
