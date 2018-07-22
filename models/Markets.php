<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%markets}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $avatar
 *
 * @property Products[] $products
 */
class Markets extends \yii\db\ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return '{{%markets}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'avatar'], 'string', 'max' => 255],

            [['imageFile'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'avatar' => 'Avatar',
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id_markets' => 'id']);
    }
}
