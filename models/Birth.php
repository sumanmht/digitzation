<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "birth".
 *
 * @property int $id
 * @property string $registrar_name
 * @property string $reg_no
 * @property string $reg_year
 * @property string $reg_month
 * @property string $reg_day
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $birth_year
 * @property string $birth_month
 * @property string $birth_day
 * @property string $birth_place
 * @property string $gender
 * @property string $birth_type
 * @property string $grandfather_fname
 * @property string $grandfather_mname
 * @property string $grandfather_lname
 * @property string $father_fname
 * @property string $father_mname
 * @property string $father_lname
 * @property string $father_permanent_address
 * @property string $bith_country
 * @property string $father_ctz_no
 * @property string $father_ctz_year
 * @property string $father_ctz_month
 * @property string $father_ctz_day
 * @property string $father_ctz_district
 * @property string $mother_fname
 * @property string $mother_mname
 * @property string $mother_lname
 * @property string $mother_ctz_no
 * @property string $mother_ctz_year
 * @property string $mother_ctz_month
 * @property string $mother_ctz_day
 * @property string $mother_ctz_district
 * @property string $father_education
 * @property string $mother_education
 * @property string $father_mother_tongue
 * @property string $mother_mother_tongue
 * @property int $birth_count
 * @property int $living_count
 * @property string $helper
 * @property string $married_year
 * @property string $informant_fname
 * @property string $informant_mname
 * @property string $informant_lname
 * @property string $relation
 * @property string $inf_ctz_no
 * @property string $inf_ctz_year
 * @property string $inf_ctz_month
 * @property string $inf_ctz_day
 * @property string $inf_ctz_district
 */
class Birth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'birth';
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['registrar_name', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'fname', 'lname', 'birth_year', 'birth_month', 'birth_day', 'birth_place', 'gender', 'birth_type',  'father_fname', 'father_lname',  'bith_country', 'father_ctz_no', 'father_ctz_year', 'father_ctz_month', 'father_ctz_day', 'father_ctz_district', 'mother_fname', 'mother_lname',  'helper',  'informant_fname', 'informant_lname', 'relation', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'p_district', 'p_muni', 'p_ward', 'fname_eng', 'lname_eng', 'grandfather_fname_eng', 'grandfather_lname_eng', 'father_fname_eng', 'father_lname_eng', 'mother_fname_eng', 'mother_lname_eng', 'inf_fname_eng', 'inf_lname_eng'], 'required', 'message' => ''],


            [['father_age_when_birth', 'mother_age_when_birth', 'father_living_count', 'father_birth_count', 'mother_living_count', 'mother_birth_count'], 'integer'],

            [['p_district', 'registrar_name', 'bith_country', 'father_ctz_district', 'mother_ctz_district', 'father_education', 'mother_education',  'p_muni', 'inf_ctz_district'], 'string', 'max' => 50],

            [['father_permanent_address', 'mother_permanent_address'], 'string', 'max' => 100],

            [['reg_no'], 'string', 'max' => 15],

            [['fname', 'mname', 'lname', 'birth_place', 'grandfather_fname', 'grandfather_mname', 'grandfather_lname', 'father_fname', 'father_mname', 'father_lname', 'mother_fname', 'mother_mname', 'mother_lname', 'father_mother_tongue', 'mother_mother_tongue', 'helper', 'informant_fname', 'informant_mname', 'informant_lname', 'relation', 'father_religion', 'father_education', 'mother_education', 'mother_religion', 'p_ward', 'fname_eng', 'mname_eng', 'lname_eng', 'grandfather_fname_eng', 'grandfather_mname_eng', 'grandfather_lname_eng', 'father_fname_eng', 'father_mname_eng', 'father_lname_eng', 'mother_fname_eng', 'mother_mname_eng', 'mother_lname_eng', 'inf_fname_eng', 'inf_mname_eng', 'inf_lname_eng'], 'string', 'max' => 40],

            [['gender'], 'string', 'max' => 10],

            [['birth_type'], 'string', 'max' => 25],

            [['reg_year', 'ad_reg_year', 'birth_year', 'ad_birth_year', 'ad_father_ctz_year', 'ad_mother_ctz_year', 'ad_inf_ctz_year', 'father_ctz_year', 'mother_ctz_year', 'inf_ctz_year', 'married_year'], 'string', 'max' => 4],

            [['reg_month', 'ad_reg_month', 'reg_day', 'ad_reg_day', 'birth_month', 'ad_birth_month', 'birth_day', 'ad_birth_day', 'father_ctz_month', 'ad_father_ctz_month', 'father_ctz_day', 'ad_father_ctz_day', 'mother_ctz_month', 'ad_mother_ctz_month', 'mother_ctz_day', 'ad_mother_ctz_day', 'inf_ctz_month', 'ad_inf_ctz_month', 'inf_ctz_day', 'ad_inf_ctz_day'], 'string', 'max' => 2],

            [['father_ctz_no', 'mother_ctz_no', 'inf_ctz_no'], 'string', 'max' => 14],


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
            'fname' => 'Fname',
            'mname' => 'Mname',
            'lname' => 'Lname',
            'birth_year' => 'Birth Year',
            'birth_month' => 'Birth Month',
            'birth_day' => 'Birth Day',
            'birth_place' => 'Birth Place',
            'gender' => 'Gender',
            'birth_type' => 'Birth Type',
            'grandfather_fname' => 'Grandfather Fname',
            'grandfather_mname' => 'Grandfather Mname',
            'grandfather_lname' => 'Grandfather Lname',
            'father_fname' => 'Father Fname',
            'father_mname' => 'Father Mname',
            'father_lname' => 'Father Lname',
            'permanent_address' => 'Permanent Address',
            //'age_when_birth' => 'Age When Birth',
            'bith_country' => 'Bith Country',
            'father_ctz_no' => 'Father Ctz No',
            'father_ctz_year' => 'Father Ctz Year',
            'father_ctz_month' => 'Father Ctz Month',
            'father_ctz_day' => 'Father Ctz Day',
            'father_ctz_district' => 'Father Ctz District',
            'mother_fname' => 'Mother Fname',
            'mother_mname' => 'Mother Mname',
            'mother_lname' => 'Mother Lname',
            'mother_ctz_no' => 'Mother Ctz No',
            'mother_ctz_year' => 'Mother Ctz Year',
            'mother_ctz_month' => 'Mother Ctz Month',
            'mother_ctz_day' => 'Mother Ctz Day',
            'mother_ctz_district' => 'Mother Ctz District',
            'father_education' => 'Father Education',
            'mother_education' => 'Mother Education',
            'father_mother_tongue' => 'Father Mother Tongue',
            'mother_mother_tongue' => 'Mother Mother Tongue',
            //'birth_count' => 'Birth Count',
            //'living_count' => 'Living Count',
            'helper' => 'Helper',
            'married_year' => 'Married Year',
            'informant_fname' => 'Informant Fname',
            'informant_mname' => 'Informant Mname',
            'informant_lname' => 'Informant Lname',
            'relation' => 'Relation',
            'inf_ctz_no' => 'Inf Ctz No',
            'inf_ctz_year' => 'Inf Ctz Year',
            'inf_ctz_month' => 'Inf Ctz Month',
            'inf_ctz_day' => 'Inf Ctz Day',
            'inf_ctz_district' => 'Inf Ctz District',
        ];
    }
}
