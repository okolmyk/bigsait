<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $login
 * @property string $password
 * @property string $username
 * @property integer $auth_key
 * @property integer $access_token
 * @property string $userGroup
 * @property string $avatar
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $imageFile;

    public static function tableName()
    {
        return '{{%users}}';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findByLogin($login)
    {
       return Users::find()->where(['login'=>$login])->one();
    }

    public static function findIdentityByAccessToken($token, $type = null){}

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }


    public function rules()
    {
        return [
            [['login', 'password', 'email'], 'required'],
            ['auth_key', 'integer'],
            ['email', 'email'],
            [['userGroup'], 'string'],
            [['login', 'password', 'avatar'], 'string', 'max' => 255],

            [['imageFile'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => true],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'userGroup' => 'User Group',
            'avatar' => 'Avatar',
        ];
    }

    public function getUsersProducts()
    {
        return $this->hasMany(UsersProducts::className(), ['user_id' => 'id']);
    }

    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('{{%users_products}}', ['user_id' => 'id']);
    }
}
