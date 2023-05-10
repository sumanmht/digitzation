<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "birth_place".
 *
 * @property int $id
 * @property string $place
 */
class BirthPlace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'birth_place';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place'], 'required'],
            [['place'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place' => 'Place',
        ];
    }
}
