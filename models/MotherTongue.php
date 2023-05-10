<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mother_tongue".
 *
 * @property int $id
 * @property string $mother_tongue
 */
class MotherTongue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mother_tongue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mother_tongue'], 'required'],
            [['mother_tongue'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mother_tongue' => 'Mother Tongue',
        ];
    }
}
