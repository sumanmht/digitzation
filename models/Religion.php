<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "religion".
 *
 * @property int $id
 * @property string $religion
 */
class Religion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'religion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['religion'], 'required'],
            [['religion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'religion' => 'Religion',
        ];
    }
}
