<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acc".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 */
class Acc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password', 'email'], 'required'],
            [['status'], 'integer'],
            [['username', 'password', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }
}
