<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SizeProducts;

/**
 * SizeProductsSearch represents the model behind the search form about `app\models\SizeProducts`.
 */
class SizeProductsSearch extends SizeProducts
{
    public $productName;

    public function rules()
    {
        return [
            [['product_id', 'size_id'], 'integer'],
            [['productName'], 'safe']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SizeProducts::find()->with(['product', 'size']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'size_id' => $this->size_id,
            //'{{%products}}.name' => $this->productName,
        ]);

        $query->joinWith(['product' => function ($q) {
          $q->where('{{%products}}.name LIKE "%' . $this->productName . '%"');
        }]);

        return $dataProvider;
    }
}
