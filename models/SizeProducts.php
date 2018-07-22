<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%size_products}}".
 *
 * @property integer $product_id
 * @property integer $size_id
 *
 * @property Products $product
 * @property Size $size
 */
class SizeProducts extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%size_products}}';
    }

    public function rules()
    {
        return [
            [['product_id', 'size_id'], 'required'],
            [['product_id', 'size_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['size_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'size_id' => 'Size ID',
            'productName' => 'Product Name',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public function getSize()
    {
        return $this->hasOne(Size::className(), ['id' => 'size_id']);
    }

    public function getProductName()
    {
        return $this->product->name;
    }
}
