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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%value}}';
    }

    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'atribut_id' => 'Atribut ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtribut()
    {
        return $this->hasOne(Atribut::className(), ['id' => 'atribut_id']);
    }
       
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
