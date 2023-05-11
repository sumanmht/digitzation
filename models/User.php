<?php

namespace app\models;
use yii\helpers\Security;

class User extends Acc implements \yii\web\IdentityInterface
{
    // public $id;
    // public $username;
    // public $password;
    public $authKey;
    public $accessToken;
    public $status;

    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        return TRUE;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */

    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }
     /**To get username and email, which will enable logging in with both */
    // public static function findByUsernameOrEmail($usernameOrEmail)
    // {

    //     return User::find()
    //     ->where(['or', ['username' => $usernameOrEmail], ['email' => $usernameOrEmail]])
    //     ->one();
    // }

    /** To merge the username and email values to login */
    // public function findByLogin($login)
    // {
    //     return User::find()->andWhere(['or', ['username' => $login], ['email' => $login]])->one();
    // }
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }


    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    // public function generatePasswordResetToken()
    // {
    //     $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    // }

    // /**
    //  * Removes password reset token
    //  */
    // public function removePasswordResetToken()
    // {
    //     $this->password_reset_token = null;
    // }
}