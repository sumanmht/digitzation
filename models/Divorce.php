<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divorce".
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
 * @property string|null $marriage_year
 * @property string|null $marriage_month
 * @property string|null $marriage_day
 * @property string|null $groom_fname
 * @property string|null $groom_mname
 * @property string|null $groom_lname
 * @property string|null $g_birth_year
 * @property string|null $g_birth_month
 * @property string|null $g_birth_day
 * @property string|null $g_place_of_birth
 * @property string|null $g_permanent_address
 * @property string|null $g_education
 * @property string|null $g_religion
 * @property string|null $g_mother_tongue
 * @property string|null $g_prev_marital_status
 * @property string|null $g_ctz_no
 * @property string|null $g_ctz_year
 * @property string|null $g_ctz_month
 * @property string|null $g_ctz_day
 * @property string|null $g_ctz_district
 * @property string|null $g_grand_fname
 * @property string|null $g_grand_mname
 * @property string|null $g_grand_lname
 * @property string|null $g_father_fname
 * @property string|null $g_father_mname
 * @property string|null $g_father_lname
 * @property string|null $bride_fname
 * @property string|null $bride_mname
 * @property string|null $bride_lname
 * @property string|null $b_birth_year
 * @property string|null $b_birth_month
 * @property string|null $b_birth_day
 * @property string|null $b_place_of_birth
 * @property string|null $b_permanent_address
 * @property string|null $b_education
 * @property string|null $b_religion
 * @property string|null $b_mother_tongue
 * @property string|null $b_prev_marital_status
 * @property string|null $b_ctz_no
 * @property string|null $b_ctz_year
 * @property string|null $b_ctz_month
 * @property string|null $b_ctz_day
 * @property string|null $b_ctz_district
 * @property string|null $b_grand_fname
 * @property string|null $b_grand_mname
 * @property string|null $b_grand_lname
 * @property string|null $b_father_fname
 * @property string|null $b_father_mname
 * @property string|null $b_father_lname
 * @property int|null $total_child
 * @property int|null $living_child
 * @property int|null $with_father
 * @property int|null $with_mother
 * @property string|null $inf_fname
 * @property string|null $inf_mname
 * @property string|null $inf_lname
 * @property string|null $inf_ctz_no
 * @property string|null $inf_ctz_year
 * @property string|null $inf_ctz_month
 * @property string|null $inf_ctz_day
 * @property string|null $inf_ctz_district
 * @property string|null $court_address
 * @property string|null $court_name
 * @property string|null $decison_year
 * @property string|null $decison_month
 * @property string|null $decision_day
 * @property resource|null $di_scanned_image
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
    public function rules()
    {
        return [
            [['ward', 'total_child', 'living_child', 'with_father', 'with_mother'], 'integer'],
            [['di_scanned_image'], 'string'],
            [['district', 'local_level', 'g_place_of_birth', 'g_permanent_address', 'g_ctz_district', 'b_place_of_birth', 'b_permanent_address', 'b_ctz_district', 'inf_ctz_district', 'court_address', 'court_name'], 'string', 'max' => 50],
            [['reg_no', 'g_prev_marital_status', 'b_prev_marital_status'], 'string', 'max' => 10],
            [['reg_year', 'marriage_year', 'g_birth_year', 'g_ctz_year', 'b_birth_year', 'b_ctz_year', 'inf_ctz_year', 'decison_year'], 'string', 'max' => 4],
            [['reg_month', 'reg_day', 'marriage_month', 'marriage_day', 'g_birth_month', 'g_birth_day', 'g_ctz_month', 'g_ctz_day', 'b_birth_month', 'b_birth_day', 'b_ctz_month', 'b_ctz_day', 'inf_ctz_month', 'inf_ctz_day', 'decison_month', 'decision_day'], 'string', 'max' => 2],
            [['registrar_name', 'groom_fname', 'groom_mname', 'groom_lname', 'g_education', 'g_religion', 'g_mother_tongue', 'g_grand_fname', 'g_grand_mname', 'g_grand_lname', 'g_father_fname', 'g_father_mname', 'g_father_lname', 'bride_fname', 'bride_mname', 'bride_lname', 'b_education', 'b_religion', 'b_mother_tongue', 'b_grand_fname', 'b_grand_mname', 'b_grand_lname', 'b_father_fname', 'b_father_mname', 'b_father_lname', 'inf_fname', 'inf_mname', 'inf_lname'], 'string', 'max' => 40],
            [['g_ctz_no', 'b_ctz_no', 'inf_ctz_no'], 'string', 'max' => 15],
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
            'marriage_year' => 'Marriage Year',
            'marriage_month' => 'Marriage Month',
            'marriage_day' => 'Marriage Day',
            'groom_fname' => 'Groom Fname',
            'groom_mname' => 'Groom Mname',
            'groom_lname' => 'Groom Lname',
            'g_birth_year' => 'G Birth Year',
            'g_birth_month' => 'G Birth Month',
            'g_birth_day' => 'G Birth Day',
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
            'g_ctz_district' => 'G Ctz District',
            'g_grand_fname' => 'G Grand Fname',
            'g_grand_mname' => 'G Grand Mname',
            'g_grand_lname' => 'G Grand Lname',
            'g_father_fname' => 'G Father Fname',
            'g_father_mname' => 'G Father Mname',
            'g_father_lname' => 'G Father Lname',
            'bride_fname' => 'Bride Fname',
            'bride_mname' => 'Bride Mname',
            'bride_lname' => 'Bride Lname',
            'b_birth_year' => 'B Birth Year',
            'b_birth_month' => 'B Birth Month',
            'b_birth_day' => 'B Birth Day',
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
            'b_ctz_district' => 'B Ctz District',
            'b_grand_fname' => 'B Grand Fname',
            'b_grand_mname' => 'B Grand Mname',
            'b_grand_lname' => 'B Grand Lname',
            'b_father_fname' => 'B Father Fname',
            'b_father_mname' => 'B Father Mname',
            'b_father_lname' => 'B Father Lname',
            'total_child' => 'Total Child',
            'living_child' => 'Living Child',
            'with_father' => 'With Father',
            'with_mother' => 'With Mother',
            'inf_fname' => 'Inf Fname',
            'inf_mname' => 'Inf Mname',
            'inf_lname' => 'Inf Lname',
            'inf_ctz_no' => 'Inf Ctz No',
            'inf_ctz_year' => 'Inf Ctz Year',
            'inf_ctz_month' => 'Inf Ctz Month',
            'inf_ctz_day' => 'Inf Ctz Day',
            'inf_ctz_district' => 'Inf Ctz District',
            'court_address' => 'Court Address',
            'court_name' => 'Court Name',
            'decison_year' => 'Decison Year',
            'decison_month' => 'Decison Month',
            'decision_day' => 'Decision Day',
            'di_scanned_image' => 'Di Scanned Image',
        ];
    }
}
