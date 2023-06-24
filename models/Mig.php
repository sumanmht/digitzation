<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mig".
 *
 * @property int $id
 * @property string $inf_fname
 * @property string $inf_mname
 * @property string $inf_lname
 * @property string $inf_fname_eng
 * @property string $inf_mname_eng
 * @property string $inf_lname_eng
 * @property string $registrar_name
 * @property string $reg_no
 * @property string $reg_year
 * @property string $reg_month
 * @property string $reg_day
 * @property string $ad_reg_year
 * @property string $ad_reg_month
 * @property string $ad_reg_day
 * @property string $inf_birth_year
 * @property string $inf_birth_month
 * @property string $inf_birth_day
 * @property string $ad_inf_birth_year
 * @property string $ad_inf_birth_month
 * @property string $ad_inf_birth_day
 * @property string $inf_gender
 * @property string $inf_birth_place
 * @property string $inf_education
 * @property string $inf_ctz_no
 * @property string $inf_ctz_year
 * @property string $inf_ctz_month
 * @property string $inf_ctz_day
 * @property string $ad_inf_ctz_year
 * @property string $ad_inf_ctz_month
 * @property string $ad_inf_ctz_day
 * @property string $inf_ctz_district
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
 * @property string $ad_migration_year
 * @property string $ad_migration_month
 * @property string $ad_migration_day
 * @property string $reason
 * @property resource $m_scanned_image
 * @property string $district
 * @property string $local_level
 * @property string $ward
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
            //[['inf_fname', 'inf_lname', 'inf_fname_eng', 'inf_lname_eng', 'registrar_name', 'reg_no', 'reg_year', 'reg_month', 'reg_day',  'inf_birth_year', 'inf_birth_month', 'inf_birth_day', 'inf_gender', 'inf_birth_place', 'inf_education', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'inf_occupation', 'inf_religion', 'inf_mother_tongue',  'migration_year', 'migration_month', 'migration_day',  'reason', 'district', 'local_level', 'ward'], 'required'],
            [['inf_fname', 'inf_mname', 'inf_lname', 'inf_fname_eng', 'inf_mname_eng', 'inf_lname_eng', 'registrar_name', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'ad_reg_year', 'ad_reg_month', 'ad_reg_day', 'inf_birth_year', 'inf_birth_month', 'inf_birth_day', 'ad_inf_birth_year', 'ad_inf_birth_month', 'ad_inf_birth_day', 'inf_gender', 'inf_birth_place', 'inf_education', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'ad_inf_ctz_year', 'ad_inf_ctz_month', 'ad_inf_ctz_day', 'inf_ctz_district', 'inf_occupation', 'inf_religion', 'inf_mother_tongue', 'going_district', 'going_local_level', 'going_ward', 'coming_district', 'coming_local_level', 'coming_ward', 'migration_year', 'migration_month', 'migration_day', 'ad_migration_year', 'ad_migration_month', 'ad_migration_day', 'reason', 'm_scanned_image', 'district', 'local_level', 'ward'], 'string'],
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
            'inf_fname_eng' => 'Inf Fname Eng',
            'inf_mname_eng' => 'Inf Mname Eng',
            'inf_lname_eng' => 'Inf Lname Eng',
            'registrar_name' => 'Registrar Name',
            'reg_no' => 'Reg No',
            'reg_year' => 'Reg Year',
            'reg_month' => 'Reg Month',
            'reg_day' => 'Reg Day',
            'ad_reg_year' => 'Ad Reg Year',
            'ad_reg_month' => 'Ad Reg Month',
            'ad_reg_day' => 'Ad Reg Day',
            'inf_birth_year' => 'Inf Birth Year',
            'inf_birth_month' => 'Inf Birth Month',
            'inf_birth_day' => 'Inf Birth Day',
            'ad_inf_birth_year' => 'Ad Inf Birth Year',
            'ad_inf_birth_month' => 'Ad Inf Birth Month',
            'ad_inf_birth_day' => 'Ad Inf Birth Day',
            'inf_gender' => 'Inf Gender',
            'inf_birth_place' => 'Inf Birth Place',
            'inf_education' => 'Inf Education',
            'inf_ctz_no' => 'Inf Ctz No',
            'inf_ctz_year' => 'Inf Ctz Year',
            'inf_ctz_month' => 'Inf Ctz Month',
            'inf_ctz_day' => 'Inf Ctz Day',
            'ad_inf_ctz_year' => 'Ad Inf Ctz Year',
            'ad_inf_ctz_month' => 'Ad Inf Ctz Month',
            'ad_inf_ctz_day' => 'Ad Inf Ctz Day',
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
            'ad_migration_year' => 'Ad Migration Year',
            'ad_migration_month' => 'Ad Migration Month',
            'ad_migration_day' => 'Ad Migration Day',
            'reason' => 'Reason',
            'm_scanned_image' => 'M Scanned Image',
            'district' => 'District',
            'local_level' => 'Local Level',
            'ward' => 'Ward',
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
