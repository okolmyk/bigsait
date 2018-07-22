<?php

namespace app\controllers\admin;

use Yii;
use app\models\Value;
use app\models\search\ValueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ValueController implements the CRUD actions for Value model.
 */
class ValueController extends Controller
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
        $searchModel = new ValueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($product_id, $atribut_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $atribut_id),
        ]);
    }

    public function actionCreate($product_id = null)
    {
        $model = new Value();
        $model->product_id = $product_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
      			if($_GET){
      				 return $this->redirect(['admin/products/view', 'id' => $model->product_id]);
            }
      			else{
      				 return $this->redirect(['view', 'product_id' => $model->product_id, 'atribut_id' => $model->atribut_id]);
      			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

/*    public function actionCreate($product_id = null)
    {
        $model = new Value();
        $model->product_id = $product_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/products/view', 'id' => $model->product_id]);
           // return $this->redirect(['view', 'product_id' => $model->product_id, 'atribut_id' => $model->atribut_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionUpdate($product_id, $atribut_id)
    {
        $model = $this->findModel($product_id, $atribut_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'atribut_id' => $model->atribut_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($product_id, $atribut_id)
    {
        $this->findModel($product_id, $atribut_id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($product_id, $atribut_id)
    {
        if (($model = Value::findOne(['product_id' => $product_id, 'atribut_id' => $atribut_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
