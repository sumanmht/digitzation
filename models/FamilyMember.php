<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "family_member".
 *
 * @property int $id
 * @property int $inf_id
 * @property string $member_fname
 * @property string $member_mname
 * @property string $member_lname
 * @property string $birth_year
 * @property string $birth_month
 * @property string $birth_day
 * @property string $mem_gender
 * @property string $mem_birth_place
 * @property string $relation_with_inf
 *
 * @property Migrated $inf
 */
class FamilyMember extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'family_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inf_id', 'member_fname', 'member_mname', 'member_lname', 'birth_year', 'birth_month', 'birth_day', 'mem_gender', 'mem_birth_place', 'relation_with_inf'], 'required'],
            [['inf_id'], 'integer'],
            [['member_fname', 'member_mname', 'member_lname'], 'string', 'max' => 40],
            [['birth_year'], 'string', 'max' => 4],
            [['birth_month', 'birth_day'], 'string', 'max' => 2],
            [['mem_gender'], 'string', 'max' => 10],
            [['mem_birth_place', 'relation_with_inf'], 'string', 'max' => 50],
            [['inf_id'], 'exist', 'skipOnError' => true, 'targetClass' => Migrated::class, 'targetAttribute' => ['inf_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inf_id' => 'Inf ID',
            'member_fname' => 'Member Fname',
            'member_mname' => 'Member Mname',
            'member_lname' => 'Member Lname',
            'birth_year' => 'Birth Year',
            'birth_month' => 'Birth Month',
            'birth_day' => 'Birth Day',
            'mem_gender' => 'Mem Gender',
            'mem_birth_place' => 'Mem Birth Place',
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
        return $this->hasOne(Migrated::class, ['id' => 'inf_id']);
    }
}
