<?php

namespace app\controllers\admin;

use Yii;
use app\models\SizeProducts;
use app\models\search\SizeProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * SizeProductsController implements the CRUD actions for SizeProducts model.
 */
class SizeProductsController extends Controller
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
     * Lists all SizeProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SizeProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SizeProducts model.
     * @param integer $product_id
     * @param integer $size_id
     * @return mixed
     */
    public function actionView($product_id, $size_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $size_id),
        ]);
    }

    /**
     * Creates a new SizeProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
        
        $model = new SizeProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'size_id' => $model->size_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SizeProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $size_id
     * @return mixed
     */
    public function actionUpdate($product_id, $size_id)
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
        
        $model = $this->findModel($product_id, $size_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'size_id' => $model->size_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SizeProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $size_id
     * @return mixed
     */
    public function actionDelete($product_id, $size_id)
    {
        if (!Yii::$app->user->can('create')) {
			throw new ForbiddenHttpException('Access denied');	
		}
        
        $this->findModel($product_id, $size_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SizeProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $size_id
     * @return SizeProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $size_id)
    {
        if (($model = SizeProducts::findOne(['product_id' => $product_id, 'size_id' => $size_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
