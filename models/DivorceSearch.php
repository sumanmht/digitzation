<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Divorce;

/**
 * DivorceSearch represents the model behind the search form of `app\models\Divorce`.
 */
class DivorceSearch extends Divorce
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ward', 'total_child', 'living_child', 'with_father', 'with_mother'], 'integer'],
            [['district', 'local_level', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'registrar_name', 'marriage_year', 'marriage_month', 'marriage_day', 'groom_fname', 'groom_mname', 'groom_lname', 'g_birth_year', 'g_birth_month', 'g_birth_day', 'g_place_of_birth', 'g_permanent_address', 'g_education', 'g_religion', 'g_mother_tongue', 'g_prev_marital_status', 'g_ctz_no', 'g_ctz_year', 'g_ctz_month', 'g_ctz_day', 'g_ctz_district', 'g_grand_fname', 'g_grand_mname', 'g_grand_lname', 'g_father_fname', 'g_father_mname', 'g_father_lname', 'bride_fname', 'bride_mname', 'bride_lname', 'b_birth_year', 'b_birth_month', 'b_birth_day', 'b_place_of_birth', 'b_permanent_address', 'b_education', 'b_religion', 'b_mother_tongue', 'b_prev_marital_status', 'b_ctz_no', 'b_ctz_year', 'b_ctz_month', 'b_ctz_day', 'b_ctz_district', 'b_grand_fname', 'b_grand_mname', 'b_grand_lname', 'b_father_fname', 'b_father_mname', 'b_father_lname', 'inf_fname', 'inf_mname', 'inf_lname', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'court_address', 'court_name', 'decison_year', 'decison_month', 'decision_day', 'di_scanned_image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Divorce::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ward' => $this->ward,
            'total_child' => $this->total_child,
            'living_child' => $this->living_child,
            'with_father' => $this->with_father,
            'with_mother' => $this->with_mother,
        ]);

        $query->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'local_level', $this->local_level])
            ->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'reg_year', $this->reg_year])
            ->andFilterWhere(['like', 'reg_month', $this->reg_month])
            ->andFilterWhere(['like', 'reg_day', $this->reg_day])
            ->andFilterWhere(['like', 'registrar_name', $this->registrar_name])
            ->andFilterWhere(['like', 'marriage_year', $this->marriage_year])
            ->andFilterWhere(['like', 'marriage_month', $this->marriage_month])
            ->andFilterWhere(['like', 'marriage_day', $this->marriage_day])
            ->andFilterWhere(['like', 'groom_fname', $this->groom_fname])
            ->andFilterWhere(['like', 'groom_mname', $this->groom_mname])
            ->andFilterWhere(['like', 'groom_lname', $this->groom_lname])
            ->andFilterWhere(['like', 'g_birth_year', $this->g_birth_year])
            ->andFilterWhere(['like', 'g_birth_month', $this->g_birth_month])
            ->andFilterWhere(['like', 'g_birth_day', $this->g_birth_day])
            ->andFilterWhere(['like', 'g_place_of_birth', $this->g_place_of_birth])
            ->andFilterWhere(['like', 'g_permanent_address', $this->g_permanent_address])
            ->andFilterWhere(['like', 'g_education', $this->g_education])
            ->andFilterWhere(['like', 'g_religion', $this->g_religion])
            ->andFilterWhere(['like', 'g_mother_tongue', $this->g_mother_tongue])
            ->andFilterWhere(['like', 'g_prev_marital_status', $this->g_prev_marital_status])
            ->andFilterWhere(['like', 'g_ctz_no', $this->g_ctz_no])
            ->andFilterWhere(['like', 'g_ctz_year', $this->g_ctz_year])
            ->andFilterWhere(['like', 'g_ctz_month', $this->g_ctz_month])
            ->andFilterWhere(['like', 'g_ctz_day', $this->g_ctz_day])
            ->andFilterWhere(['like', 'g_ctz_district', $this->g_ctz_district])
            ->andFilterWhere(['like', 'g_grand_fname', $this->g_grand_fname])
            ->andFilterWhere(['like', 'g_grand_mname', $this->g_grand_mname])
            ->andFilterWhere(['like', 'g_grand_lname', $this->g_grand_lname])
            ->andFilterWhere(['like', 'g_father_fname', $this->g_father_fname])
            ->andFilterWhere(['like', 'g_father_mname', $this->g_father_mname])
            ->andFilterWhere(['like', 'g_father_lname', $this->g_father_lname])
            ->andFilterWhere(['like', 'bride_fname', $this->bride_fname])
            ->andFilterWhere(['like', 'bride_mname', $this->bride_mname])
            ->andFilterWhere(['like', 'bride_lname', $this->bride_lname])
            ->andFilterWhere(['like', 'b_birth_year', $this->b_birth_year])
            ->andFilterWhere(['like', 'b_birth_month', $this->b_birth_month])
            ->andFilterWhere(['like', 'b_birth_day', $this->b_birth_day])
            ->andFilterWhere(['like', 'b_place_of_birth', $this->b_place_of_birth])
            ->andFilterWhere(['like', 'b_permanent_address', $this->b_permanent_address])
            ->andFilterWhere(['like', 'b_education', $this->b_education])
            ->andFilterWhere(['like', 'b_religion', $this->b_religion])
            ->andFilterWhere(['like', 'b_mother_tongue', $this->b_mother_tongue])
            ->andFilterWhere(['like', 'b_prev_marital_status', $this->b_prev_marital_status])
            ->andFilterWhere(['like', 'b_ctz_no', $this->b_ctz_no])
            ->andFilterWhere(['like', 'b_ctz_year', $this->b_ctz_year])
            ->andFilterWhere(['like', 'b_ctz_month', $this->b_ctz_month])
            ->andFilterWhere(['like', 'b_ctz_day', $this->b_ctz_day])
            ->andFilterWhere(['like', 'b_ctz_district', $this->b_ctz_district])
            ->andFilterWhere(['like', 'b_grand_fname', $this->b_grand_fname])
            ->andFilterWhere(['like', 'b_grand_mname', $this->b_grand_mname])
            ->andFilterWhere(['like', 'b_grand_lname', $this->b_grand_lname])
            ->andFilterWhere(['like', 'b_father_fname', $this->b_father_fname])
            ->andFilterWhere(['like', 'b_father_mname', $this->b_father_mname])
            ->andFilterWhere(['like', 'b_father_lname', $this->b_father_lname])
            ->andFilterWhere(['like', 'inf_fname', $this->inf_fname])
            ->andFilterWhere(['like', 'inf_mname', $this->inf_mname])
            ->andFilterWhere(['like', 'inf_lname', $this->inf_lname])
            ->andFilterWhere(['like', 'inf_ctz_no', $this->inf_ctz_no])
            ->andFilterWhere(['like', 'inf_ctz_year', $this->inf_ctz_year])
            ->andFilterWhere(['like', 'inf_ctz_month', $this->inf_ctz_month])
            ->andFilterWhere(['like', 'inf_ctz_day', $this->inf_ctz_day])
            ->andFilterWhere(['like', 'inf_ctz_district', $this->inf_ctz_district])
            ->andFilterWhere(['like', 'court_address', $this->court_address])
            ->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'decison_year', $this->decison_year])
            ->andFilterWhere(['like', 'decison_month', $this->decison_month])
            ->andFilterWhere(['like', 'decision_day', $this->decision_day])
            ->andFilterWhere(['like', 'di_scanned_image', $this->di_scanned_image]);

        return $dataProvider;
    }
}
