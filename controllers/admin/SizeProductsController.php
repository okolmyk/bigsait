<?php

namespace app\controllers\admin;

use Yii;
use app\models\SizeProducts;
use app\models\search\SizeProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;

/**
 * SizeProductsController implements the CRUD actions for SizeProducts model.
 */
class SizeProductsController extends Controller
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
                          			if(Yii::$app->user->identity->userGroup === 'admin' || Yii::$app->user->identity->adminGroup === 'manager'){
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
                          	   if(Yii::$app->user->identity->userGroup === 'admin' || Yii::$app->user->identity->adminGroup === 'manager'){
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
        $searchModel = new SizeProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($product_id, $size_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $size_id),
        ]);
    }

    public function actionCreate()
    {
        // if (!Yii::$app->user->can('create')) {
			  //      throw new ForbiddenHttpException('Access denied');
		    // }

        $model = new SizeProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'size_id' => $model->size_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($product_id, $size_id)
    {
        // if (!Yii::$app->user->can('create')) {
			  //      throw new ForbiddenHttpException('Access denied');
		    // }

        $model = $this->findModel($product_id, $size_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'size_id' => $model->size_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($product_id, $size_id)
    {
        // if (!Yii::$app->user->can('create')) {
			  //      throw new ForbiddenHttpException('Access denied');
		    // }

        $this->findModel($product_id, $size_id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($product_id, $size_id)
    {
        if (($model = SizeProducts::findOne(['product_id' => $product_id, 'size_id' => $size_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
