<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Value;

use app\models\Products;

/**
 * ValueSearch represents the model behind the search form about `app\models\Value`.
 */
class ValueSearch extends Value
{

    public $productName;
    public $atributName;

    public function rules()
    {
        return [
            [['product_id', 'atribut_id'], 'integer'],
            [['value'], 'safe'],
            [['productName'], 'safe'],
            [['atributName'], 'safe'],
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
        $query = Value::find()->with(['product', 'atribut']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $dataProvider->setSort([
            'attributes' => [
                'productName' => [
                    'asc' => ['{{%products}}.name' => SORT_ASC],
                    'desc' => ['{{%products}}.name' => SORT_DESC],
                    'label' => 'Product Name'
                ],
                'atributName' => [
                    'asc' => ['{{%atribut}}.name' => SORT_ASC],
                    'desc' => ['{{%atribut}}.name' => SORT_DESC],
                    'label' => 'Atribut Name'
                ],
                'value' => [
                    'asc' => ['{{%value}}.value' => SORT_ASC],
                    'desc' => ['{{%value}}.value' => SORT_DESC],
                    'label' => 'Value'
                ]
              ]
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'atribut_id' => $this->atribut_id,
            //'{{%products}}.name' => $this->productName,
            //'{{%atribut}}.name' => $this->atributName,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        $query->joinWith(['product' => function ($q) {
          $q->where('{{%products}}.name LIKE "%' . $this->productName . '%"');
        }]);

        $query->joinWith(['atribut' => function ($q) {
          $q->where('{{%atribut}}.name LIKE "%' . $this->atributName . '%"');
        }]);

        return $dataProvider;
    }
}
