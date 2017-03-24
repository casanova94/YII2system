<?php

namespace app\models;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "yii_user".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property integer $password
 */
class YiiUser extends \yii\db\ActiveRecord  implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'username', 'password'], 'required'],
            [['password'], 'string'],
            [['firstname', 'lastname', 'username'], 'string', 'max' => 20],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

     public static function findIdentity($id)
    {
        return static::findOne($id);
    }

     public function getId()
    {
        return $this->id;
    }

public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException();//No implementado 
    }

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
 
    public function validatePassword($password){
        //return $this->password === $password;
         return  Yii::$app->getSecurity()->validatePassword($password,$this->password);
    }

 
public function beforeSave($insert) {

     if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
                echo $this->password;
            }
            return true;
        }
        return false;
}



public function getAuthKey()
{
    throw new NotSupportedException();//No implementado
}
 
public function validateAuthKey($authKey)
{
   throw new NotSupportedException();//No implementado
}
}
