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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%size}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizeProducts()
    {
        return $this->hasMany(SizeProducts::className(), ['size_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('{{%size_products}}', ['size_id' => 'id']);
    }
}
