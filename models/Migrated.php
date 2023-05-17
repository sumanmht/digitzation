<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "migrated".
 *
 * @property int $id
 * @property string $registrar_name
 * @property string $reg_no
 * @property string $reg_year
 * @property string $reg_month
 * @property string $reg_day
 * @property string $inf_fname
 * @property string $inf_mname
 * @property string $inf_lname
 * @property string $inf_birth_year
 * @property string $inf_birth_month
 * @property string $inf_birth_day
 * @property string $inf_gender
 * @property string $inf_birth_place
 * @property string $inf_ctz_no
 * @property string $inf_ctz_year
 * @property string $inf_ctz_month
 * @property string $inf_ctz_day
 * @property string $inf_ctz_district
 * @property string $inf_education
 * @property string $inf_occupation
 * @property string $inf_religion
 * @property string $inf_mother_tongue
 * @property string $going_district
 * @property string $going_local_level
 * @property string $going_ward
 * @property string $coming_district
 * @property string $coming_local_level
 * @property string $coming_ward
 * @property string $migration_year
 * @property string $migration_month
 * @property string $migration_day
 * @property string $reason
 * @property resource $migration_scanned_image
 *
 * @property FamilyMember[] $familyMembers
 */
class Migrated extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $radio;
    public static function tableName()
    {
        return 'migrated';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registrar_name', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'inf_fname', 'inf_mname', 'inf_lname', 'inf_birth_year', 'inf_birth_month', 'inf_birth_day', 'inf_gender', 'inf_birth_place', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'inf_education', 'inf_occupation', 'inf_religion', 'inf_mother_tongue', 'going_district', 'going_local_level', 'going_ward', 'coming_district', 'coming_local_level', 'coming_ward', 'migration_year', 'migration_month', 'migration_day', 'reason', 'migration_scanned_image'], 'required'],
            [['migration_scanned_image'], 'string'],
            [['registrar_name', 'inf_birth_place', 'inf_ctz_district', 'inf_education', 'going_district', 'coming_district'], 'string', 'max' => 50],
            [['reg_no', 'inf_gender'], 'string', 'max' => 10],
            [['reg_year', 'inf_birth_year', 'inf_ctz_year', 'migration_year'], 'string', 'max' => 4],
            [['reg_month', 'reg_day', 'inf_birth_month', 'inf_birth_day', 'inf_ctz_month', 'inf_ctz_day', 'going_ward', 'coming_ward', 'migration_month', 'migration_day'], 'string', 'max' => 2],
            [['inf_fname', 'inf_mname', 'inf_lname', 'inf_occupation', 'inf_religion', 'inf_mother_tongue', 'going_local_level', 'coming_local_level', 'reason'], 'string', 'max' => 40],
            [['inf_ctz_no'], 'string', 'max' => 14],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registrar_name' => 'Registrar Name',
            'reg_no' => 'Reg No',
            'reg_year' => 'Reg Year',
            'reg_month' => 'Reg Month',
            'reg_day' => 'Reg Day',
            'inf_fname' => 'Inf Fname',
            'inf_mname' => 'Inf Mname',
            'inf_lname' => 'Inf Lname',
            'inf_birth_year' => 'Inf Birth Year',
            'inf_birth_month' => 'Inf Birth Month',
            'inf_birth_day' => 'Inf Birth Day',
            'inf_gender' => 'Inf Gender',
            'inf_birth_place' => 'Inf Birth Place',
            'inf_ctz_no' => 'Inf Ctz No',
            'inf_ctz_year' => 'Inf Ctz Year',
            'inf_ctz_month' => 'Inf Ctz Month',
            'inf_ctz_day' => 'Inf Ctz Day',
            'inf_ctz_district' => 'Inf Ctz District',
            'inf_education' => 'Inf Education',
            'inf_occupation' => 'Inf Occupation',
            'inf_religion' => 'Inf Religion',
            'inf_mother_tongue' => 'Inf Mother Tongue',
            'going_district' => 'Going District',
            'going_local_level' => 'Going Local Level',
            'going_ward' => 'Going Ward',
            'coming_district' => 'Coming District',
            'coming_local_level' => 'Coming Local Level',
            'coming_ward' => 'Coming Ward',
            'migration_year' => 'Migration Year',
            'migration_month' => 'Migration Month',
            'migration_day' => 'Migration Day',
            'reason' => 'Reason',
            'migration_scanned_image' => 'Migration Scanned Image',
        ];
    }

    /**
     * Gets query for [[FamilyMembers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyMembers()
    {
        return $this->hasMany(FamilyMember::class, ['inf_id' => 'id']);
    }
}
