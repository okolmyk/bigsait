<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%value}}".
 *
 * @property integer $product_id
 * @property integer $atribut_id
 * @property string $value
 *
 * @property Atribut $atribut
 * @property Products $product
 */
class Value extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%value}}';
    }

    public function rules()
    {
        return [
            [['product_id', 'atribut_id', 'value'], 'required'],
            [['product_id', 'atribut_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['atribut_id'], 'exist', 'skipOnError' => true, 'targetClass' => Atribut::className(), 'targetAttribute' => ['atribut_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'atribut_id' => 'Atribut ID',
            'productName' => 'Product Name',
            'atributName' => 'Atribut Name',
            'value' => 'Value',
        ];
    }

    public function getAtribut()
    {
        return $this->hasOne(Atribut::className(), ['id' => 'atribut_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public function getProductName()
    {
        return $this->product->name;
    }

    public function getAtributName()
    {
        return $this->atribut->name;
    }
}
