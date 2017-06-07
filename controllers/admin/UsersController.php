<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
         /*   'access' => [
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
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
        
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if ($model->save()) {
					$img = $model->id . '.' . $model->imageFile->extension;
					$model->imageFile->saveAs('./photo-users/' . $img);
					$model->avatar = $img;
					$model->save(false, ['avatar']);
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
			
        return $this->render('create', [ 'model' => $model,]);
    }
    
/*    public function actionCreate() //базовая сгенерированная
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Users model.
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
					$model->imageFile->saveAs('./photo-users/' . $img);
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
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
}
