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
class WomanController extends Controller
{
	public function actionIndex()
	{
			$dataProvider = new ActiveDataProvider([
				'query' => Products::find()->where(['sex_category' => 'Женский'])->with(['idCategory', 'idMarkets']),
				'pagination' => ['pageSize' => 20],
				'sort' => [
						'defaultOrder' => [
							//'id' => SORT_DESC,
							'id' => SORT_ASC,
						]
				],
			]);

			return $this->render('index', ['dataProvider' => $dataProvider]);
	}
}
