<?php

namespace app\components;

use yii\base\Behavior;
use yii\web\Controller;

use yii\db\ActiveRecord;

class MyBehaviors extends Behavior{

	public $attribute;


	public function events(){

			return[
				ActiveRecord::EVENT_BEFORE_VALIDATE => 'mymethod',
			];
	}


	public function mymethod(){
    // работать не будет так как видимо из за использования поискщвой модели
    // а возможно из за чего то другого например поисковых фильтров
    // стандартная "простая" запись неработоспособна и приводит к ошибкам
    // например неотображается спиок товаров

		/*$a = $this->owner->{$this->attribute};

		$a = ucfirst($a);

		$this->owner->{$this->attribute} = $a;*/
	}
}
