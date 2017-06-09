<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CategoryProducts;
use app\models\Products;
use yii\db\Expression;

/**
 * CategoryProductsSearch represents the model behind the search form about `app\models\CategoryProducts`.
 */
class CategoryProductsSearch extends CategoryProducts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
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
        //$query = CategoryProducts::find();
        
        $query = CategoryProducts::find()
        ->select(['{{%category_products}}.*', 'products_count' => new Expression('COUNT({{%products}}.id)')])
        ->joinWith(['products'], false)
        ->groupBy(['{{%category_products}}.id']);

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
