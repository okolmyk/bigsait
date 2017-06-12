<?php

namespace app\controllers\admin;

use Yii;
use app\models\Value;
use app\models\search\ValueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ValueController implements the CRUD actions for Value model.
 */
class ValueController extends Controller
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
     * Lists all Value models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ValueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Value model.
     * @param integer $product_id
     * @param integer $atribut_id
     * @return mixed
     */
    public function actionView($product_id, $atribut_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $atribut_id),
        ]);
    }

    /**
     * Creates a new Value model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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

    /**
     * Updates an existing Value model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $atribut_id
     * @return mixed
     */
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

    /**
     * Deletes an existing Value model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $atribut_id
     * @return mixed
     */
    public function actionDelete($product_id, $atribut_id)
    {
        $this->findModel($product_id, $atribut_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Value model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $atribut_id
     * @return Value the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $atribut_id)
    {
        if (($model = Value::findOne(['product_id' => $product_id, 'atribut_id' => $atribut_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
