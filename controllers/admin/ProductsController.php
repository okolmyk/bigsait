<?php

namespace app\controllers\admin;

use Yii;
use app\models\Products;
use app\models\CategoryProducts;
use app\models\SizeProducts;
use app\models\search\ProductsSearch;
use app\models\User;
use app\controllers\admin\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\filters\auth\HttpBasicAuth;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => ['view'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => ['create'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function($rule, $action){
                          			if(Yii::$app->user->identity->userGroup === 'admin'){
                          						return true;
                          					}
                          					else{
                          						return false;
                          					}
                      					}
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function($rule, $action){
                          	   if(Yii::$app->user->identity->userGroup === 'admin'){
                          				  return true;
                          		    }
                          		    else{
                          				  return false;
                          		    }
                    				}
                        ],
                        [
                            'actions' => ['delete'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function($rule, $action){
                          				if(Yii::$app->user->identity->userGroup === 'admin'){
                          						return true;
                          					}
                          					else{
                          						return false;
                          					}
                        		}
                        ],
                    ],
                ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        // if (!Yii::$app->user->can('create')) {
			  //    throw new ForbiddenHttpException('Access denied');
		    // }

        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {

    			if(Yii::$app->request->post('size') && is_array(Yii::$app->request->post('size'))){
    				if($model->save()){
    					foreach(Yii::$app->request->post('size') as $size) {
    						$ml = new SizeProducts();
    						$ml->product_id = $model->id;
    						$ml->size_id = $size;
    						$ml->save();
    					}
    				}
    			}

    			if($model->imageFile = UploadedFile::getInstance($model, 'imageFile')){
    				if ($model->save()){
    						$img = $model->id . '.' . $model->imageFile->extension;
    						$model->imageFile->saveAs('./photo/' . $img);
    						$model->pictures = $img;
    						$model->save(false, ['pictures']);
    						return $this->redirect(['view', 'id' => $model->id]);
    				}
    			}

				$model->save();
				return $this->redirect(['view', 'id' => $model->id]);
		}

        return $this->render('create', ['model' => $model,]);
    }

/*    public function actionCreate()
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');
		}

        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {
			if($model->imageFile = UploadedFile::getInstance($model, 'imageFile')){
				if ($model->save()) {
						$img = $model->id . '.' . $model->imageFile->extension;
						$model->imageFile->saveAs('./photo/' . $img);
						$model->pictures = $img;
						$model->save(false, ['pictures']);
						return $this->redirect(['view', 'id' => $model->id]);
					}
				}
				$model->save();
				return $this->redirect(['view', 'id' => $model->id]);
			}

        return $this->render('create', ['model' => $model,]);
    }*/


    public function actionUpdate($id)
    {
        // if (!Yii::$app->user->can('create')) {
			  //     throw new ForbiddenHttpException('Access denied');
		    // }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

			      SizeProducts::deleteAll(['product_id' => $model->id]);

      			if(Yii::$app->request->post('size') && is_array(Yii::$app->request->post('size'))){

      					foreach(Yii::$app->request->post('size') as $size) {
      					$ml = new SizeProducts();
      					$ml->product_id = $model->id;
      					$ml->size_id = $size;
      					$ml->save();
      				}
			  }

        if($model->imageFile = UploadedFile::getInstance($model, 'imageFile')){

          if ($model->save()){
							$img = $model->id . '.' . $model->imageFile->extension;
							$model->imageFile->saveAs('./photo/' . $img);
							$model->pictures = $img;
							$model->save(false, ['pictures']);
							return $this->redirect(['view', 'id' => $model->id]);
						}
				}

				    $model->save();

				    return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

/*    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');
		}

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->imageFile = UploadedFile::getInstance($model, 'imageFile')){
					if ($model->save()){
							$img = $model->id . '.' . $model->imageFile->extension;
							$model->imageFile->saveAs('./photo/' . $img);
							$model->pictures = $img;
							$model->save(false, ['pictures']);
							return $this->redirect(['view', 'id' => $model->id]);
						}
				}
				$model->save();
				return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionDelete($id)
    {
        // if (!Yii::$app->user->can('create')) {
			  //     throw new ForbiddenHttpException('Access denied');
		    // }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionProductsone($id)
    {

		    $result_one = Products::find()->where(['id' => $id])->one();

        $data1 = new ActiveDataProvider([
			     'query' => Products::find()->with(['idCategory', 'idMarkets'])->where(['id' => $id]),
			     'pagination' => false,
        ]);

        $data2 = new ActiveDataProvider([
			      'query' => Products::find()->with(['idCategory', 'idMarkets'])->where(['id_markets' => $result_one->id_markets])->andWhere('id != :id', ['id' => $id])->orderBy(['id' => SORT_DESC])->limit(4),
			      'pagination' => false,

        ]);

        return $this->render('productsone', ['data1' => $data1, 'data2' => $data2]);

	   }

     protected function findModel($id)
     {
         if (($model = Products::findOne($id)) !== null) {
             return $model;
         } else {
             throw new NotFoundHttpException('The requested page does not exist.');
         }
     }
}
