<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Birth;

/**
 * BirthSearch represents the model behind the search form of `app\models\Birth`.
 */
class BirthSearch extends Birth
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reg_year', 'reg_month', 'reg_day', 'birth_year', 'birth_month', 'birth_day', 'father_age_when_birth', 'mother_age_when_birth', 'father_ctz_year', 'father_ctz_month', 'father_ctz_day', 'mother_ctz_year', 'mother_ctz_month', 'mother_ctz_day', 'father_birth_count', 'father_living_count', 'married_year', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district'], 'integer'],
            [['registrar_name', 'reg_no', 'fname', 'mname', 'lname', 'birth_place', 'gender', 'birth_type', 'grandfather_fname', 'grandfather_mname', 'grandfather_lname', 'father_fname', 'father_mname', 'father_lname', 'father_permanent_address', 'bith_country', 'father_ctz_no', 'father_ctz_district', 'mother_fname', 'mother_mname', 'mother_lname', 'mother_ctz_no', 'mother_ctz_district', 'father_education', 'mother_education', 'father_mother_tongue', 'mother_mother_tongue', 'helper', 'informant_fname', 'informant_mname', 'informant_lname', 'relation', 'inf_ctz_no'], 'safe'],
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
        $query = Birth::find();

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
            'reg_year' => $this->reg_year,
            'reg_month' => $this->reg_month,
            'reg_day' => $this->reg_day,
            'birth_year' => $this->birth_year,
            'birth_month' => $this->birth_month,
            'birth_day' => $this->birth_day,
            'father_age_when_birth' => $this->father_age_when_birth,
            'father_ctz_year' => $this->father_ctz_year,
            'father_ctz_month' => $this->father_ctz_month,
            'father_ctz_day' => $this->father_ctz_day,
            'mother_ctz_year' => $this->mother_ctz_year,
            'mother_ctz_month' => $this->mother_ctz_month,
            'mother_ctz_day' => $this->mother_ctz_day,
            'father_birth_count' => $this->father_birth_count,
            'father_living_count' => $this->father_living_count,
            'married_year' => $this->married_year,
            'inf_ctz_year' => $this->inf_ctz_year,
            'inf_ctz_month' => $this->inf_ctz_month,
            'inf_ctz_day' => $this->inf_ctz_day,
            'inf_ctz_district' => $this->inf_ctz_district,
        ]);

        $query->andFilterWhere(['like', 'registrar_name', $this->registrar_name])
            ->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'mname', $this->mname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'birth_type', $this->birth_type])
            ->andFilterWhere(['like', 'grandfather_fname', $this->grandfather_fname])
            ->andFilterWhere(['like', 'grandfather_mname', $this->grandfather_mname])
            ->andFilterWhere(['like', 'grandfather_lname', $this->grandfather_lname])
            ->andFilterWhere(['like', 'father_fname', $this->father_fname])
            ->andFilterWhere(['like', 'father_mname', $this->father_mname])
            ->andFilterWhere(['like', 'father_lname', $this->father_lname])
            ->andFilterWhere(['like', 'father_permanent_address', $this->father_permanent_address])
            ->andFilterWhere(['like', 'bith_country', $this->bith_country])
            ->andFilterWhere(['like', 'father_ctz_no', $this->father_ctz_no])
            ->andFilterWhere(['like', 'father_ctz_district', $this->father_ctz_district])
            ->andFilterWhere(['like', 'mother_fname', $this->mother_fname])
            ->andFilterWhere(['like', 'mother_mname', $this->mother_mname])
            ->andFilterWhere(['like', 'mother_lname', $this->mother_lname])
            ->andFilterWhere(['like', 'mother_ctz_no', $this->mother_ctz_no])
            ->andFilterWhere(['like', 'mother_ctz_district', $this->mother_ctz_district])
            ->andFilterWhere(['like', 'father_education', $this->father_education])
            ->andFilterWhere(['like', 'mother_education', $this->mother_education])
            ->andFilterWhere(['like', 'father_mother_tongue', $this->father_mother_tongue])
            ->andFilterWhere(['like', 'mother_mother_tongue', $this->mother_mother_tongue])
            ->andFilterWhere(['like', 'helper', $this->helper])
            ->andFilterWhere(['like', 'informant_fname', $this->informant_fname])
            ->andFilterWhere(['like', 'informant_mname', $this->informant_mname])
            ->andFilterWhere(['like', 'informant_lname', $this->informant_lname])
            ->andFilterWhere(['like', 'relation', $this->relation])
            ->andFilterWhere(['like', 'inf_ctz_no', $this->inf_ctz_no]);

        return $dataProvider;
    }
}
