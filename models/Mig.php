<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mig".
 *
 * @property int $id
 * @property string|null $inf_fname
 * @property string|null $inf_mname
 * @property string|null $inf_lname
 * @property string|null $registrar_name
 * @property string|null $reg_no
 * @property string|null $reg_year
 * @property string|null $reg_month
 * @property string|null $reg_day
 * @property string|null $inf_birth_year
 * @property string|null $inf_birth_month
 * @property string|null $inf_birth_day
 * @property string|null $inf_gender
 * @property string|null $inf_birth_place
 * @property string|null $inf_education
 * @property string|null $inf_ctz_no
 * @property string|null $inf_ctz_year
 * @property string|null $inf_ctz_month
 * @property string|null $inf_ctz_day
 * @property string|null $inf_ctz_district
 * @property string|null $inf_occupation
 * @property string|null $inf_religion
 * @property string|null $inf_mother_tongue
 * @property string|null $going_district
 * @property string|null $going_local_level
 * @property string|null $going_ward
 * @property string|null $coming_district
 * @property string|null $coming_local_level
 * @property string|null $coming_ward
 * @property string|null $migration_year
 * @property string|null $migration_month
 * @property string|null $migration_day
 * @property string|null $reason
 * @property resource|null $m_scanned_image
 *
 * @property Fam[] $fams
 */
class Mig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mig';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['inf_fname', 'inf_mname', 'inf_lname', 'registrar_name', 'inf_education', 'inf_occupation', 'inf_religion', 'inf_mother_tongue'], 'string', 'max' => 40],
            [['reg_no', 'inf_gender', 'going_ward', 'coming_ward'], 'string', 'max' => 10],
            [['reg_year', 'inf_birth_year', 'inf_ctz_year', 'migration_year'], 'string', 'max' => 4],
            [['reg_month', 'reg_day', 'inf_birth_month', 'inf_birth_day', 'inf_ctz_month', 'inf_ctz_day', 'migration_month', 'migration_day'], 'string', 'max' => 2],
            [['inf_birth_place', 'inf_ctz_district', 'going_district', 'going_local_level', 'coming_district', 'coming_local_level'], 'string', 'max' => 50],
            [['inf_ctz_no', 'reason'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inf_fname' => 'Inf Fname',
            'inf_mname' => 'Inf Mname',
            'inf_lname' => 'Inf Lname',
            'registrar_name' => 'Registrar Name',
            'reg_no' => 'Reg No',
            'reg_year' => 'Reg Year',
            'reg_month' => 'Reg Month',
            'reg_day' => 'Reg Day',
            'inf_birth_year' => 'Inf Birth Year',
            'inf_birth_month' => 'Inf Birth Month',
            'inf_birth_day' => 'Inf Birth Day',
            'inf_gender' => 'Inf Gender',
            'inf_birth_place' => 'Inf Birth Place',
            'inf_education' => 'Inf Education',
            'inf_ctz_no' => 'Inf Ctz No',
            'inf_ctz_year' => 'Inf Ctz Year',
            'inf_ctz_month' => 'Inf Ctz Month',
            'inf_ctz_day' => 'Inf Ctz Day',
            'inf_ctz_district' => 'Inf Ctz District',
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
            'm_scanned_image' => 'M Scanned Image',
        ];
    }

    /**
     * Gets query for [[Fams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFams()
    {
        return $this->hasMany(Fam::class, ['inf_id' => 'id']);
    }
}
