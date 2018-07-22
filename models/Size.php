<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%size}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property SizeProducts[] $sizeProducts
 * @property Products[] $products
 */
class Size extends \yii\db\ActiveRecord
{
    //public $products_count_size;

    public static function tableName()
    {
        return '{{%size}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getSizeProducts()
    {
        return $this->hasMany(SizeProducts::className(), ['size_id' => 'id']);
    }

    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('{{%size_products}}', ['size_id' => 'id']);
    }
}
