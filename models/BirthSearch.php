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

    public $birthsearch;
    public function rules()
    {
        return [
            [['id', 'reg_year', 'reg_month', 'reg_day', 'birth_year', 'birth_month', 'birth_day', 'father_age_when_birth', 'mother_age_when_birth', 'father_ctz_year', 'father_ctz_month', 'father_ctz_day', 'mother_ctz_year', 'mother_ctz_month', 'mother_ctz_day', 'father_birth_count', 'father_living_count', 'married_year', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district'], 'integer'],
            [['registrar_name', 'birthsearch', 'reg_no', 'fname', 'mname', 'lname', 'birth_place', 'gender', 'birth_type', 'grandfather_fname', 'grandfather_mname', 'grandfather_lname', 'father_fname', 'father_mname', 'father_lname', 'father_permanent_address', 'bith_country', 'father_ctz_no', 'father_ctz_district', 'mother_fname', 'mother_mname', 'mother_lname', 'mother_ctz_no', 'mother_ctz_district', 'father_education', 'mother_education', 'father_mother_tongue', 'mother_mother_tongue', 'helper', 'informant_fname', 'informant_mname', 'informant_lname', 'relation', 'inf_ctz_no'], 'safe'],
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
            'pagination' => [
                'pageSize' => 5,  // Limit the number of items per page to 10
            ],
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

        $query->orFilterWhere(['like', 'registrar_name', $this->birthsearch])
            ->orFilterWhere(['like', 'reg_no', $this->birthsearch])
            ->orFilterWhere(['like', 'fname', $this->birthsearch])
            ->orFilterWhere(['like', 'mname', $this->birthsearch])
            ->orFilterWhere(['like', 'lname', $this->birthsearch])
            ->orFilterWhere(['like', 'birth_place', $this->birthsearch])
            ->orFilterWhere(['like', 'gender', $this->birthsearch])
            ->orFilterWhere(['like', 'birth_type', $this->birthsearch])
            ->orFilterWhere(['like', 'grandfather_fname', $this->birthsearch])
            ->orFilterWhere(['like', 'grandfather_mname', $this->birthsearch])
            ->orFilterWhere(['like', 'grandfather_lname', $this->birthsearch])
            ->orFilterWhere(['like', 'father_fname', $this->birthsearch])
            ->orFilterWhere(['like', 'father_mname', $this->birthsearch])
            ->orFilterWhere(['like', 'father_lname', $this->birthsearch])
            ->orFilterWhere(['like', 'father_permanent_address', $this->birthsearch])
            ->orFilterWhere(['like', 'bith_country', $this->birthsearch])
            ->orFilterWhere(['like', 'father_ctz_no', $this->birthsearch])
            ->orFilterWhere(['like', 'father_ctz_district', $this->birthsearch])
            ->orFilterWhere(['like', 'mother_fname', $this->birthsearch])
            ->orFilterWhere(['like', 'mother_mname', $this->birthsearch])
            ->orFilterWhere(['like', 'mother_lname', $this->birthsearch])
            ->orFilterWhere(['like', 'mother_ctz_no', $this->birthsearch])
            ->orFilterWhere(['like', 'mother_ctz_district', $this->birthsearch])
            ->orFilterWhere(['like', 'father_education', $this->birthsearch])
            ->orFilterWhere(['like', 'mother_education', $this->birthsearch])
            ->orFilterWhere(['like', 'father_mother_tongue', $this->birthsearch])
            ->orFilterWhere(['like', 'mother_mother_tongue', $this->birthsearch])
            ->orFilterWhere(['like', 'helper', $this->birthsearch])
            ->orFilterWhere(['like', 'informant_fname', $this->birthsearch])
            ->orFilterWhere(['like', 'informant_mname', $this->birthsearch])
            ->orFilterWhere(['like', 'informant_lname', $this->birthsearch])
            ->orFilterWhere(['like', 'relation', $this->birthsearch])
            ->orFilterWhere(['like', 'inf_ctz_no', $this->birthsearch])
            ->orFilterWhere(['like', 'p_district', $this->birthsearch])
            ->orFilterWhere(['like', 'p_muni', $this->birthsearch])
            ->orFilterWhere(['like', 'p_ward', $this->birthsearch]);

        // $query->andFilterWhere(['like', 'registrar_name', $this->registrar_name])
        //     ->andFilterWhere(['like', 'reg_no', $this->reg_no])
        //     ->andFilterWhere(['like', 'fname', $this->fname])
        //     ->andFilterWhere(['like', 'mname', $this->mname])
        //     ->andFilterWhere(['like', 'lname', $this->lname])
        //     ->andFilterWhere(['like', 'birth_place', $this->birth_place])
        //     ->andFilterWhere(['like', 'gender', $this->gender])
        //     ->andFilterWhere(['like', 'birth_type', $this->birth_type])
        //     ->andFilterWhere(['like', 'grandfather_fname', $this->grandfather_fname])
        //     ->andFilterWhere(['like', 'grandfather_mname', $this->grandfather_mname])
        //     ->andFilterWhere(['like', 'grandfather_lname', $this->grandfather_lname])
        //     ->andFilterWhere(['like', 'father_fname', $this->father_fname])
        //     ->andFilterWhere(['like', 'father_mname', $this->father_mname])
        //     ->andFilterWhere(['like', 'father_lname', $this->father_lname])
        //     ->andFilterWhere(['like', 'father_permanent_address', $this->father_permanent_address])
        //     ->andFilterWhere(['like', 'bith_country', $this->birthsearch])
        //     ->andFilterWhere(['like', 'father_ctz_no', $this->birthsearch])
        //     ->andFilterWhere(['like', 'father_ctz_district', $this->birthsearch])
        //     ->andFilterWhere(['like', 'mother_fname', $this->birthsearch])
        //     ->andFilterWhere(['like', 'mother_mname', $this->birthsearch])
        //     ->andFilterWhere(['like', 'mother_lname', $this->birthsearch])
        //     ->andFilterWhere(['like', 'mother_ctz_no', $this->birthsearch])
        //     ->andFilterWhere(['like', 'mother_ctz_district', $this->birthsearch])
        //     ->andFilterWhere(['like', 'father_education', $this->birthsearch])
        //     ->andFilterWhere(['like', 'mother_education', $this->birthsearch])
        //     ->andFilterWhere(['like', 'father_mother_tongue', $this->birthsearch])
        //     ->andFilterWhere(['like', 'mother_mother_tongue', $this->birthsearch])
        //     ->andFilterWhere(['like', 'helper', $this->birthsearch])
        //     ->andFilterWhere(['like', 'informant_fname', $this->birthsearch])
        //     ->andFilterWhere(['like', 'informant_mname', $this->birthsearch])
        //     ->andFilterWhere(['like', 'informant_lname', $this->birthsearch])
        //     ->andFilterWhere(['like', 'relation', $this->birthsearch])
        //     ->andFilterWhere(['like', 'inf_ctz_no', $this->birthsearch]);


        return $dataProvider;
    }
}
