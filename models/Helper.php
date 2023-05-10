<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "helper".
 *
 * @property int $id
 * @property string $helper
 */
class Helper extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'helper';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['helper'], 'required'],
            [['helper'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'helper' => 'Helper',
        ];
    }
}
