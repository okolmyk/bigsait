<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%category_products}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Products[] $products
 */
class CategoryProducts extends \yii\db\ActiveRecord
{
    public $products_count;

    public static function tableName()
    {
        return '{{%category_products}}';
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

    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id_category' => 'id']);
    }
}
