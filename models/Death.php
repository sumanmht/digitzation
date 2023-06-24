<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "death".
 *
 * @property int $id
 * @property string|null $district
 * @property string|null $local_level
 * @property int|null $ward
 * @property string|null $reg_no
 * @property string|null $reg_year
 * @property string|null $reg_month
 * @property string|null $reg_day
 * @property string|null $registrar_name
 * @property string|null $fname
 * @property string|null $mname
 * @property string|null $lname
 * @property string|null $birth_year
 * @property string|null $birth_month
 * @property string|null $birth_day
 * @property string|null $gender
 * @property string|null $place_of_death
 * @property string|null $permanent_address
 * @property string|null $death_year
 * @property string|null $death_month
 * @property string|null $death_day
 * @property string|null $education
 * @property string|null $religion
 * @property string|null $mother_tongue
 * @property string|null $marital_status
 * @property string|null $ctz_no
 * @property string|null $ctz_year
 * @property string|null $ctz_month
 * @property string|null $ctz_day
 * @property string|null $ctz_district
 * @property string|null $grand_fname
 * @property string|null $grand_mname
 * @property string|null $grand_lname
 * @property string|null $father_fname
 * @property string|null $father_mname
 * @property string|null $father_lname
 * @property string|null $spouse_fname
 * @property string|null $spouse_mname
 * @property string|null $spouse_lname
 * @property string|null $reason_of_death
 * @property string|null $inf_fname
 * @property string|null $inf_mname
 * @property string|null $inf_lname
 * @property string|null $inf_ctz_no
 * @property string|null $inf_ctz_year
 * @property string|null $inf_ctz_month
 * @property string|null $inf_ctz_day
 * @property string|null $inf_ctz_district
 * @property resource|null $d_scanned_image
 */
class Death extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'death';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['d_scanned_image'], 'file'],
            [['district', 'local_level', 'place_of_death', 'permanent_address', 'ctz_district', 'inf_ctz_district'], 'string', 'max' => 50],
            [['reg_no', 'gender', 'marital_status'], 'string', 'max' => 10],
            [['reg_year', 'ad_reg_year', 'birth_year', 'ad_birth_year', 'death_year', 'ad_death_year', 'ctz_year', 'ad_ctz_year', 'inf_ctz_year', 'ad_inf_ctz_year'], 'string', 'max' => 4],
            [['reg_month', 'ad_reg_month', 'reg_day', 'ad_reg_day', 'birth_month', 'ad_birth_month', 'birth_day', 'ad_birth_day', 'death_month', 'ad_death_month', 'death_day', 'ad_death_day', 'ctz_month', 'ad_ctz_month', 'ctz_day', 'ad_ctz_day',  'inf_ctz_month', 'ad_inf_ctz_month', 'inf_ctz_day', 'ad_inf_ctz_day'], 'string', 'max' => 2],
            [['registrar_name', 'fname', 'fname_eng', 'mname', 'mname_eng', 'lname', 'lname_eng', 'education', 'religion', 'mother_tongue', 'grand_fname', 'grand_fname_eng', 'grand_mname', 'grand_mname_eng', 'grand_lname', 'grand_lname_eng', 'father_fname', 'father_fname_eng', 'father_mname', 'father_mname_eng', 'father_lname', 'father_lname_eng', 'spouse_fname', 'spouse_fname_eng', 'spouse_mname', 'spouse_mname_eng', 'spouse_lname', 'spouse_lname_eng', 'reason_of_death', 'inf_fname', 'inf_fname_eng', 'inf_mname', 'inf_mname_eng', 'inf_lname', 'inf_lname_eng'], 'string', 'max' => 40],
            [['ctz_no', 'inf_ctz_no'], 'string', 'max' => 15],
            [['relation', 'ward'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district' => 'District',
            'local_level' => 'Local Level',
            'ward' => 'Ward',
            'reg_no' => 'Reg No',
            'reg_year' => 'Reg Year',
            'reg_month' => 'Reg Month',
            'reg_day' => 'Reg Day',
            'registrar_name' => 'Registrar Name',
            'fname' => 'Fname',
            'mname' => 'Mname',
            'lname' => 'Lname',
            'birth_year' => 'Birth Year',
            'birth_month' => 'Birth Month',
            'birth_day' => 'Birth Day',
            'gender' => 'Gender',
            'place_of_death' => 'Place Of Death',
            'permanent_address' => 'Permanent Address',
            'death_year' => 'Death Year',
            'death_month' => 'Death Month',
            'death_day' => 'Death Day',
            'education' => 'Education',
            'religion' => 'Religion',
            'mother_tongue' => 'Mother Tongue',
            'marital_status' => 'Marital Status',
            'ctz_no' => 'Ctz No',
            'ctz_year' => 'Ctz Year',
            'ctz_month' => 'Ctz Month',
            'ctz_day' => 'Ctz Day',
            'ctz_district' => 'Ctz District',
            'grand_fname' => 'Grand Fname',
            'grand_mname' => 'Grand Mname',
            'grand_lname' => 'Grand Lname',
            'father_fname' => 'Father Fname',
            'father_mname' => 'Father Mname',
            'father_lname' => 'Father Lname',
            'spouse_fname' => 'Spouse Fname',
            'spouse_mname' => 'Spouse Mname',
            'spouse_lname' => 'Spouse Lname',
            'reason_of_death' => 'Reason Of Death',
            'inf_fname' => 'Inf Fname',
            'inf_mname' => 'Inf Mname',
            'inf_lname' => 'Inf Lname',
            'inf_ctz_no' => 'Inf Ctz No',
            'inf_ctz_year' => 'Inf Ctz Year',
            'inf_ctz_month' => 'Inf Ctz Month',
            'inf_ctz_day' => 'Inf Ctz Day',
            'inf_ctz_district' => 'Inf Ctz District',
            'd_scanned_image' => 'D Scanned Image',
        ];
    }
}
