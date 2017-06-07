<?php

namespace app\controllers\admin;

use Yii;
use app\models\Markets;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\ForbiddenHttpException;

/**
 * MarketsController implements the CRUD actions for Markets model.
 */
class MarketsController extends Controller
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
        
        /*    'authenticator' => [
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
     * Lists all Markets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Markets::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Markets model.
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
     * Creates a new Markets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
        
        $model = new Markets();

        if ($model->load(Yii::$app->request->post())) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if ($model->save()) {
					$img = $model->id . '.' . $model->imageFile->extension;
					$model->imageFile->saveAs('./photo-markets/' . $img);
					$model->avatar = $img;
					$model->save(false, ['avatar']);
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
			
        return $this->render('create', [ 'model' => $model,]);
    }
    
    
    /*public function actionCreate() //базовая сгенерированная
    {
        $model = new Markets();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Markets model.
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
           $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if ($model->save()) {
					$img = $model->id . '.' . $model->imageFile->extension;
					$model->imageFile->saveAs('./photo-markets/' . $img);
					$model->avatar = $img;
					$model->save(false, ['avatar']);
					return $this->redirect(['view', 'id' => $model->id]);
				}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
/*    public function actionUpdate($id) //базовая сгенерированная
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
     * Deletes an existing Markets model.
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
     * Finds the Markets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Markets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Markets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
