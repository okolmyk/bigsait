<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;
use app\models\Size;

/**
 * ProductsSearch represents the model behind the search form about `app\models\Products`.
 */
class ProductsSearch extends Products
{
    
    public $size_id;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'size_id', 'id_markets'], 'integer'],
            [['name', 'sex_category', 'pictures'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
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
        $query = Products::find()->with(['idCategory', 'idMarkets', 'size'])->joinWith(['sizeProducts'], false);

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
            'id' => $this->id,
            'id_category' => $this->id_category,
            'id_markets' => $this->id_markets,
            '{{%size_products}}.size_id' => $this->size_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sex_category', $this->sex_category])
            ->andFilterWhere(['like', 'pictures', $this->pictures]);

        return $dataProvider;
    }
}
