<?php

namespace app\controllers\api;

use Yii;
use yii\rest\ActiveController;	
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth; 

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Products';
    
    
/*    public function actionCreate()
    {
		var_dump($_POST); die();
		
		return parent::actionCreate();
	}*/
    
/*	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => \yii\filters\VerbFilter::className(),
				'actions' => [
					'index'  => ['get'],
					'view'   => ['get'],
					'create' => ['get', 'post'],
					'update' => ['get', 'put', 'post'],
					'delete' => ['post', 'delete'],
				],
			],
		];
	}*/
	
	
/*	public function behaviors()
    {

        return ArrayHelper::merge(parent::behaviors(), [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                    'index'  => ['get'],
					'view'   => ['get'],
					'create' => ['get', 'post'],
					'update' => ['get', 'put', 'post'],
					'delete' => ['post', 'delete'],
                ],
            ],
        ]);

        $behaviors = parent::behaviors();
			$behaviors['authenticator'] = [
				'class' => HttpBasicAuth::className(),
			];
		return $behaviors;
    }*/
    
    
/*	public function behaviors()
    {
		$behaviors = parent::behaviors();
			$behaviors['authenticator'] = [
				'class' => HttpBasicAuth::className(),
			];
		return $behaviors;
    } */
    
   /* public function behaviors()
    {
        return [
         
            'authenticator' => [
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
				
            ],
        ];
    }*/
    
    
/*    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['class'] = HttpBasicAuth::className();
        $behaviors['authenticator']['only'] = ['view'];
        return $behaviors;
    }*/
   
}


