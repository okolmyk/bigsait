<?php

namespace app\controllers\admin;

use Yii;
use app\models\Users;
use app\models\CategoryProducts;
use app\models\Products;
use app\models\Markets;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class ManController extends Controller
{
	public function actionIndex()
	{
			$dataProvider = new ActiveDataProvider([
				
				'query' => Products::find()->where(['sex_category' => 'Мужской'])->with(['idCategory', 'idMarkets']),
				
				'pagination' => ['pageSize' => 5],
			
			]);
			
			
			return $this->render('index', ['dataProvider' => $dataProvider]);
	}
}
