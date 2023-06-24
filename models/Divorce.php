<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divorce".
 *
 * @property int $id
 * @property string $district
 * @property string $local_level
 * @property string $ward
 * @property string $reg_no
 * @property string $reg_year
 * @property string $reg_month
 * @property string $reg_day
 * @property string $ad_reg_year
 * @property string $ad_reg_month
 * @property string $ad_reg_day
 * @property string $registrar_name
 * @property string $marriage_year
 * @property string $marriage_month
 * @property string $marriage_day
 * @property string $ad_marriage_year
 * @property string $ad_marriage_month
 * @property string $ad_marriage_day
 * @property string $groom_fname
 * @property string $groom_mname
 * @property string $groom_lname
 * @property string $groom_fname_eng
 * @property string $groom_mname_eng
 * @property string $groom_lname_eng
 * @property string $g_birth_year
 * @property string $g_birth_month
 * @property string $g_birth_day
 * @property string $ad_g_birth_year
 * @property string $ad_g_birth_month
 * @property string $ad_g_birth_day
 * @property string $g_place_of_birth
 * @property string $g_permanent_address
 * @property string $g_education
 * @property string $g_religion
 * @property string $g_mother_tongue
 * @property string $g_prev_marital_status
 * @property string $g_ctz_no
 * @property string $g_ctz_year
 * @property string $g_ctz_month
 * @property string $g_ctz_day
 * @property string $ad_g_ctz_year
 * @property string $ad_g_ctz_month
 * @property string $ad_g_ctz_day
 * @property string $g_ctz_district
 * @property string $g_grand_fname
 * @property string $g_grand_mname
 * @property string $g_grand_lname
 * @property string $g_grand_fname_eng
 * @property string $g_grand_mname_eng
 * @property string $g_grand_lname_eng
 * @property string $g_father_fname
 * @property string $g_father_mname
 * @property string $g_father_lname
 * @property string $g_father_fname_eng
 * @property string $g_father_mname_eng
 * @property string $g_father_lname_eng
 * @property string $bride_fname
 * @property string $bride_mname
 * @property string $bride_lname
 * @property string $bride_fname_eng
 * @property string $bride_mname_eng
 * @property string $bride_lname_eng
 * @property string $b_birth_year
 * @property string $b_birth_month
 * @property string $b_birth_day
 * @property string $ad_b_birth_year
 * @property string $ad_b_birth_month
 * @property string $ad_b_birth_day
 * @property string $b_place_of_birth
 * @property string $b_permanent_address
 * @property string $b_education
 * @property string $b_religion
 * @property string $b_mother_tongue
 * @property string $b_prev_marital_status
 * @property string $b_ctz_no
 * @property string $b_ctz_year
 * @property string $b_ctz_month
 * @property string $b_ctz_day
 * @property string $ad_b_ctz_year
 * @property string $ad_b_ctz_month
 * @property string $ad_b_ctz_day
 * @property string $b_ctz_district
 * @property string $b_grand_fname
 * @property string $b_grand_mname
 * @property string $b_grand_lname
 * @property string $b_grand_fname_eng
 * @property string $b_grand_mname_eng
 * @property string $b_grand_lname_eng
 * @property string $b_father_fname
 * @property string $b_father_mname
 * @property string $b_father_lname
 * @property string $b_father_fname_eng
 * @property string $b_father_mname_eng
 * @property string $b_father_lname_eng
 * @property int $total_child
 * @property int $living_child
 * @property int $with_father
 * @property int $with_mother
 * @property string $inf_fname
 * @property string $inf_mname
 * @property string $inf_lname
 * @property string $inf_fname_eng
 * @property string $inf_mname_eng
 * @property string $inf_lname_eng
 * @property string $inf_ctz_no
 * @property string $inf_ctz_year
 * @property string $inf_ctz_month
 * @property string $inf_ctz_day
 * @property string $ad_inf_ctz_year
 * @property string $ad_inf_ctz_month
 * @property string $ad_inf_ctz_day
 * @property string $inf_ctz_district
 * @property string $court_address
 * @property string $court_name
 * @property string $decison_year
 * @property string $decison_month
 * @property string $decision_day
 * @property string $ad_decison_year
 * @property string $ad_decison_month
 * @property string $ad_decision_day
 * @property resource $di_scanned_image
 */
class Divorce extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'divorce';
    }

    /**
     * {@inheritdoc}
     */
    public $district_id;
    public function rules()
    {
        return [
            [['district_id'], 'required'],
            [['id', 'district', 'local_level', 'ward', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'registrar_name', 'marriage_year', 'marriage_month', 'marriage_day',  'groom_fname', 'groom_lname', 'groom_fname_eng',  'groom_lname_eng', 'g_birth_year', 'g_birth_month', 'g_birth_day', 'g_place_of_birth', 'g_permanent_address', 'g_education', 'g_religion', 'g_mother_tongue', 'g_prev_marital_status', 'g_ctz_no', 'g_ctz_year', 'g_ctz_month', 'g_ctz_day', 'g_ctz_district', 'g_grand_fname', 'g_grand_lname', 'g_grand_fname_eng', 'g_grand_lname_eng', 'g_father_fname',  'g_father_lname', 'g_father_fname_eng',  'g_father_lname_eng', 'bride_fname',  'bride_lname', 'bride_fname_eng', 'bride_lname_eng', 'b_birth_year', 'b_birth_month', 'b_birth_day',  'b_place_of_birth', 'b_permanent_address', 'b_education', 'b_religion', 'b_mother_tongue', 'b_prev_marital_status', 'b_ctz_no', 'b_ctz_year', 'b_ctz_month', 'b_ctz_day', 'b_ctz_district', 'b_grand_fname',  'b_grand_lname', 'b_grand_fname_eng',  'b_grand_lname_eng', 'b_father_fname', 'b_father_lname', 'b_father_fname_eng',  'b_father_lname_eng', 'total_child', 'living_child', 'with_father', 'with_mother', 'inf_fname', 'inf_lname', 'inf_fname_eng', 'inf_lname_eng', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'court_address', 'court_name', 'decison_year', 'decison_month', 'decision_day', 'di_scanned_image'], 'required'],
            [['id', 'total_child', 'living_child', 'with_father', 'with_mother'], 'integer'],
            [['district', 'local_level', 'ward', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'ad_reg_year', 'ad_reg_month', 'ad_reg_day', 'registrar_name', 'marriage_year', 'marriage_month', 'marriage_day', 'ad_marriage_year', 'ad_marriage_month', 'ad_marriage_day', 'groom_fname', 'groom_mname', 'groom_lname', 'groom_fname_eng', 'groom_mname_eng', 'groom_lname_eng', 'g_birth_year', 'g_birth_month', 'g_birth_day', 'ad_g_birth_year', 'ad_g_birth_month', 'ad_g_birth_day', 'g_place_of_birth', 'g_permanent_address', 'g_education', 'g_religion', 'g_mother_tongue', 'g_prev_marital_status', 'g_ctz_no', 'g_ctz_year', 'g_ctz_month', 'g_ctz_day', 'ad_g_ctz_year', 'ad_g_ctz_month', 'ad_g_ctz_day', 'g_ctz_district', 'g_grand_fname', 'g_grand_mname', 'g_grand_lname', 'g_grand_fname_eng', 'g_grand_mname_eng', 'g_grand_lname_eng', 'g_father_fname', 'g_father_mname', 'g_father_lname', 'g_father_fname_eng', 'g_father_mname_eng', 'g_father_lname_eng', 'bride_fname', 'bride_mname', 'bride_lname', 'bride_fname_eng', 'bride_mname_eng', 'bride_lname_eng', 'b_birth_year', 'b_birth_month', 'b_birth_day', 'ad_b_birth_year', 'ad_b_birth_month', 'ad_b_birth_day', 'b_place_of_birth', 'b_permanent_address', 'b_education', 'b_religion', 'b_mother_tongue', 'b_prev_marital_status', 'b_ctz_no', 'b_ctz_year', 'b_ctz_month', 'b_ctz_day', 'ad_b_ctz_year', 'ad_b_ctz_month', 'ad_b_ctz_day', 'b_ctz_district', 'b_grand_fname', 'b_grand_mname', 'b_grand_lname', 'b_grand_fname_eng', 'b_grand_mname_eng', 'b_grand_lname_eng', 'b_father_fname', 'b_father_mname', 'b_father_lname', 'b_father_fname_eng', 'b_father_mname_eng', 'b_father_lname_eng', 'inf_fname', 'inf_mname', 'inf_lname', 'inf_fname_eng', 'inf_mname_eng', 'inf_lname_eng', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'ad_inf_ctz_year', 'ad_inf_ctz_month', 'ad_inf_ctz_day', 'inf_ctz_district', 'court_address', 'court_name', 'decison_year', 'decison_month', 'decision_day', 'ad_decison_year', 'ad_decison_month', 'ad_decision_day', 'di_scanned_image'], 'string'],
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
            'ad_reg_year' => 'Ad Reg Year',
            'ad_reg_month' => 'Ad Reg Month',
            'ad_reg_day' => 'Ad Reg Day',
            'registrar_name' => 'Registrar Name',
            'marriage_year' => 'Marriage Year',
            'marriage_month' => 'Marriage Month',
            'marriage_day' => 'Marriage Day',
            'ad_marriage_year' => 'Ad Marriage Year',
            'ad_marriage_month' => 'Ad Marriage Month',
            'ad_marriage_day' => 'Ad Marriage Day',
            'groom_fname' => 'Groom Fname',
            'groom_mname' => 'Groom Mname',
            'groom_lname' => 'Groom Lname',
            'groom_fname_eng' => 'Groom Fname Eng',
            'groom_mname_eng' => 'Groom Mname Eng',
            'groom_lname_eng' => 'Groom Lname Eng',
            'g_birth_year' => 'G Birth Year',
            'g_birth_month' => 'G Birth Month',
            'g_birth_day' => 'G Birth Day',
            'ad_g_birth_year' => 'Ad G Birth Year',
            'ad_g_birth_month' => 'Ad G Birth Month',
            'ad_g_birth_day' => 'Ad G Birth Day',
            'g_place_of_birth' => 'G Place Of Birth',
            'g_permanent_address' => 'G Permanent Address',
            'g_education' => 'G Education',
            'g_religion' => 'G Religion',
            'g_mother_tongue' => 'G Mother Tongue',
            'g_prev_marital_status' => 'G Prev Marital Status',
            'g_ctz_no' => 'G Ctz No',
            'g_ctz_year' => 'G Ctz Year',
            'g_ctz_month' => 'G Ctz Month',
            'g_ctz_day' => 'G Ctz Day',
            'ad_g_ctz_year' => 'Ad G Ctz Year',
            'ad_g_ctz_month' => 'Ad G Ctz Month',
            'ad_g_ctz_day' => 'Ad G Ctz Day',
            'g_ctz_district' => 'G Ctz District',
            'g_grand_fname' => 'G Grand Fname',
            'g_grand_mname' => 'G Grand Mname',
            'g_grand_lname' => 'G Grand Lname',
            'g_grand_fname_eng' => 'G Grand Fname Eng',
            'g_grand_mname_eng' => 'G Grand Mname Eng',
            'g_grand_lname_eng' => 'G Grand Lname Eng',
            'g_father_fname' => 'G Father Fname',
            'g_father_mname' => 'G Father Mname',
            'g_father_lname' => 'G Father Lname',
            'g_father_fname_eng' => 'G Father Fname Eng',
            'g_father_mname_eng' => 'G Father Mname Eng',
            'g_father_lname_eng' => 'G Father Lname Eng',
            'bride_fname' => 'Bride Fname',
            'bride_mname' => 'Bride Mname',
            'bride_lname' => 'Bride Lname',
            'bride_fname_eng' => 'Bride Fname Eng',
            'bride_mname_eng' => 'Bride Mname Eng',
            'bride_lname_eng' => 'Bride Lname Eng',
            'b_birth_year' => 'B Birth Year',
            'b_birth_month' => 'B Birth Month',
            'b_birth_day' => 'B Birth Day',
            'ad_b_birth_year' => 'Ad B Birth Year',
            'ad_b_birth_month' => 'Ad B Birth Month',
            'ad_b_birth_day' => 'Ad B Birth Day',
            'b_place_of_birth' => 'B Place Of Birth',
            'b_permanent_address' => 'B Permanent Address',
            'b_education' => 'B Education',
            'b_religion' => 'B Religion',
            'b_mother_tongue' => 'B Mother Tongue',
            'b_prev_marital_status' => 'B Prev Marital Status',
            'b_ctz_no' => 'B Ctz No',
            'b_ctz_year' => 'B Ctz Year',
            'b_ctz_month' => 'B Ctz Month',
            'b_ctz_day' => 'B Ctz Day',
            'ad_b_ctz_year' => 'Ad B Ctz Year',
            'ad_b_ctz_month' => 'Ad B Ctz Month',
            'ad_b_ctz_day' => 'Ad B Ctz Day',
            'b_ctz_district' => 'B Ctz District',
            'b_grand_fname' => 'B Grand Fname',
            'b_grand_mname' => 'B Grand Mname',
            'b_grand_lname' => 'B Grand Lname',
            'b_grand_fname_eng' => 'B Grand Fname Eng',
            'b_grand_mname_eng' => 'B Grand Mname Eng',
            'b_grand_lname_eng' => 'B Grand Lname Eng',
            'b_father_fname' => 'B Father Fname',
            'b_father_mname' => 'B Father Mname',
            'b_father_lname' => 'B Father Lname',
            'b_father_fname_eng' => 'B Father Fname Eng',
            'b_father_mname_eng' => 'B Father Mname Eng',
            'b_father_lname_eng' => 'B Father Lname Eng',
            'total_child' => 'Total Child',
            'living_child' => 'Living Child',
            'with_father' => 'With Father',
            'with_mother' => 'With Mother',
            'inf_fname' => 'Inf Fname',
            'inf_mname' => 'Inf Mname',
            'inf_lname' => 'Inf Lname',
            'inf_fname_eng' => 'Inf Fname Eng',
            'inf_mname_eng' => 'Inf Mname Eng',
            'inf_lname_eng' => 'Inf Lname Eng',
            'inf_ctz_no' => 'Inf Ctz No',
            'inf_ctz_year' => 'Inf Ctz Year',
            'inf_ctz_month' => 'Inf Ctz Month',
            'inf_ctz_day' => 'Inf Ctz Day',
            'ad_inf_ctz_year' => 'Ad Inf Ctz Year',
            'ad_inf_ctz_month' => 'Ad Inf Ctz Month',
            'ad_inf_ctz_day' => 'Ad Inf Ctz Day',
            'inf_ctz_district' => 'Inf Ctz District',
            'court_address' => 'Court Address',
            'court_name' => 'Court Name',
            'decison_year' => 'Decison Year',
            'decison_month' => 'Decison Month',
            'decision_day' => 'Decision Day',
            'ad_decison_year' => 'Ad Decison Year',
            'ad_decison_month' => 'Ad Decison Month',
            'ad_decision_day' => 'Ad Decision Day',
            'di_scanned_image' => 'Di Scanned Image',
        ];
    }
}
