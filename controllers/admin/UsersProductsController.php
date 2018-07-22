<?php

namespace app\controllers\admin;

use Yii;
use app\models\UsersProducts;
use app\models\search\UsersProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersProductsController implements the CRUD actions for UsersProducts model.
 */
class UsersProductsController extends Controller
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
        ];
    }

    /**
     * Lists all UsersProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsersProducts model.
     * @param integer $user_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionView($user_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $product_id),
        ]);
    }

    /**
     * Creates a new UsersProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsersProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsersProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionUpdate($user_id, $product_id)
    {
        $model = $this->findModel($user_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UsersProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionDelete($user_id, $product_id)
    {
        $this->findModel($user_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsersProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $product_id
     * @return UsersProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $product_id)
    {
        if (($model = UsersProducts::findOne(['user_id' => $user_id, 'product_id' => $product_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
