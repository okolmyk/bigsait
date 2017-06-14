<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_category
 * @property integer $id_markets
 * @property string $sex_category
 * @property string $pictures
 *
 * @property CategoryProducts $idCategory
 * @property Markets $idMarkets
 */
class Products extends \yii\db\ActiveRecord
{
    
	public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        //    [['name', 'sex_category', 'pictures'], 'required'],
            [['name', 'sex_category'], 'required'],
            [['name', 'sex_category'], 'safe'],
            [['id_category', 'id_markets'], 'integer'],
          //  [['name', 'sex_category', 'pictures'], 'string', 'max' => 255],
            [['name', 'sex_category'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryProducts::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_markets'], 'exist', 'skipOnError' => true, 'targetClass' => Markets::className(), 'targetAttribute' => ['id_markets' => 'id']],

			//[['imageFile'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => false],
			[['imageFile'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => true],
			
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
            'id_category' => 'Id Category',
            'id_markets' => 'Id Markets',
            'sex_category' => 'Sex Category',
            'pictures' => 'Pictures',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(CategoryProducts::className(), ['id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarkets()
    {
        return $this->hasOne(Markets::className(), ['id' => 'id_markets']);
    }
    
    public function getSizeProducts()
    {
        return $this->hasMany(SizeProducts::className(), ['product_id' => 'id']);
    }
    
    public function getSize()
    {
        return $this->hasMany(Size::className(), ['id' => 'size_id'])->viaTable('{{%size_products}}', ['product_id' => 'id']);
    }
     
    public function getValue()
    {
        return $this->hasMany(Value::className(), ['product_id' => 'id']);
    }
    
    public function getAtribut()
    {
        return $this->hasMany(Atribut::className(), ['id' => 'atribut_id'])->viaTable('{{%value}}', ['product_id', 'id']);
    }
          
    
/*    public function beforeValidate()
    {
		//die('sdfsf');
		print_r($_POST); 
		print_r($this->attributes);
		return parent::beforeValidate();
	}*/
    
}
