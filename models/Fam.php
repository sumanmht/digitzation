<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fam".
 *
 * @property int $id
 * @property string|null $mem_fname
 * @property string|null $mem_mname
 * @property string|null $mem_lname
 * @property string|null $birth_year
 * @property string|null $birth_month
 * @property string|null $birth_day
 * @property int|null $inf_id
 * @property string|null $mem_birth_place
 * @property string|null $mem_gender
 * @property string|null $relation_with_inf
 *
 * @property Mig $inf
 */
class Fam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inf_id'], 'integer'],
            [['mem_fname', 'mem_mname', 'mem_lname'], 'string', 'max' => 40],
            [['birth_year'], 'string', 'max' => 4],
            [['birth_month', 'birth_day', 'mem_birth_place'], 'string', 'max' => 2],
            [['mem_gender'], 'string', 'max' => 10],
            [['relation_with_inf'], 'string', 'max' => 50],
            [['inf_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mig::class, 'targetAttribute' => ['inf_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mem_fname' => 'Mem Fname',
            'mem_mname' => 'Mem Mname',
            'mem_lname' => 'Mem Lname',
            'birth_year' => 'Birth Year',
            'birth_month' => 'Birth Month',
            'birth_day' => 'Birth Day',
            'inf_id' => 'Inf ID',
            'mem_birth_place' => 'Mem Birth Place',
            'mem_gender' => 'Mem Gender',
            'relation_with_inf' => 'Relation With Inf',
        ];
    }

    /**
     * Gets query for [[Inf]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInf()
    {
        return $this->hasOne(Mig::class, ['id' => 'inf_id']);
    }
    
}
