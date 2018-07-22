<?php

namespace app\controllers\admin;

use Yii;
use app\models\Markets;
use app\models\search\MarketsSearch;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;

/**
 * MarketsController implements the CRUD actions for Markets model.
 */
class MarketsController extends Controller
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
        $searchModel = new MarketsSearch();
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
			  //      throw new ForbiddenHttpException('Access denied');
		    // }

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


    public function actionUpdate($id)
    {
      //  if (!Yii::$app->user->can('create')) {
			//       throw new ForbiddenHttpException('Access denied');
		  //  }

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

    public function actionDelete($id)
    {
        // if (!Yii::$app->user->can('create')) {
			  //      throw new ForbiddenHttpException('Access denied');
		    // }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Markets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
