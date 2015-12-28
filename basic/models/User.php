<?php

namespace app\models;

use Yii;

use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use yii\data\ActiveDataProvider;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class User extends ActiveRecord implements IdentityInterface
{
    /* public $id;
     public $username;
     public $password;
    */
    public $auth_key;
    /* public $accessToken;
     public $first_name;
     public $last_name;
     public $address;
     public $city;
     public $state;
     public $zip;*/
    public $countSameZip;

    public static function tableName()
    {
        return 'tbl_users';
    }

    public function rules()
    {
        return [
            [['username', 'password', 'first_name', 'last_name', 'address', 'city', 'state', 'zip'], 'required'],
            [['zip'], 'integer'],
            [['username', 'city', 'state'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 100],
            [['first_name'], 'string', 'max' => 30],
            [['last_name'], 'string', 'max' => 40],
            [['address'], 'string', 'max' => 80],
            [['username'], 'unique']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
        ];
    }

    /*public function getMjcRegistryitems()
    {
        return $this->hasMany(Cartitem::className(), ['create_user_id' => 'id']);
    }

    public function getMjcRegistrylists()
    {
        return $this->hasMany(CartList::className(), ['create_user_id' => 'id']);
    }*/

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findByUsernameAndPassword($username, $passwordMd5)
    {
        return static::findOne(['username' => $username, 'password' => $passwordMd5]);
    }

    public static function encryptPassword($password)
    {
        return sha1($password);
    }

    public static function findByPasswordResetToken($token)
    {
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int)end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /*public function validatePassword($password)
    {
        return $this->password === $password;//sha1($password);
//        return Security::validatePassword($password, $this->password_hash);
    }*/

    public function setPassword($password)
    {
        $this->password = $password;//Security::generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function getDataChart()
    {
        $userGroupByZip = new ActiveDataProvider([
            'query' => User::find()
                ->select(['COUNT(zip) AS countSameZip', 'zip'])
                ->groupBy(['zip']),
        ]);

        return $userGroupByZip;
    }

    public static function getAll()
    {
        return new ActiveDataProvider([
            'query' => self::find(),
        ]);
    }


    public function behaviors()
    {
        return [

        ];
    }
}
