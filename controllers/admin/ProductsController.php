<?php

namespace app\controllers\admin;

use Yii;
use app\models\Products;
use app\models\CategoryProducts;
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

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            
           /* 'access' => [
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
            ],*/
            
          /*  'authenticator' => [
				'class' => HttpBasicAuth::className(),
				'realm' => 'Protected area',
				'auth' => function($username, $password){
				 
				 $user = User::findByUsername($username);
				 
				 if($user && $user->validatePassword($password)){
					return $user; 
				 } else{
						return null;
					}
				}
				
            ],*/
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
		$searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); 
     
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->with(['idCategory', 'idMarkets']),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
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
    }
    
 /*   public function actionCreate() // с возможностью обязательной загрузки картинки
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
        
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if ($model->save()) {
					$img = $model->id . '.' . $model->imageFile->extension;
					$model->imageFile->saveAs('./photo/' . $img);
					$model->pictures = $img;
					$model->save(false, ['pictures']);
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
			
        return $this->render('create', ['model' => $model,]);
    }*/
/*============================================================================*/    
 /*   public function actionCreate() // упрощенная загрузка
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        
			if ($model->save()) {
					$model->imageFile->saveAs('../runtime/' . $model->imageFile->baseName . '.' . $model->imageFile->extension);
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
        //var_dump($model->errors);

        return $this->render('create', [ 'model' => $model,]);

    }*/
/*============================================================================*/     
/*    public function actionCreate() //базовая сгенерированная
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/
/*============================================================================*/  
    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
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
    }
    
/*  public function actionUpdate($id) // с возможностью обязательного апдейта картинки
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
           $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if ($model->save()) {
					$img = $model->id . '.' . $model->imageFile->extension;
					$model->imageFile->saveAs('./photo/' . $img);
					$model->pictures = $img;
					$model->save(false, ['pictures']);
					return $this->redirect(['view', 'id' => $model->id]);
				}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/
    
   /* public function actionUpdate($id) //базовая сгенерированная
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
		
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}