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
class Users extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias', 'login', 'password', 'username'], 'required'],
            [['auth_key', 'access_token'], 'integer'],
            [['userGroup'], 'string'],
            [['name', 'alias', 'login', 'password', 'username', 'avatar'], 'string', 'max' => 255],
            
            [['imageFile'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => false],
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
            'alias' => 'Alias',
            'login' => 'Login',
            'password' => 'Password',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'userGroup' => 'User Group',
            'avatar' => 'Avatar',
        ];
    }
   
}
