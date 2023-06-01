<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Death;

/**
 * DeathSearch represents the model behind the search form of `app\models\Death`.
 */
class DeathSearch extends Death
{
    /**
     * {@inheritdoc}
     */

    public $deathsearch;
    public function rules()
    {
        return [
            [['id', 'ward'], 'integer'],
            [['district', 'deathsearch', 'local_level', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'registrar_name', 'fname', 'mname', 'lname', 'birth_year', 'birth_month', 'birth_day', 'gender', 'place_of_death', 'permanent_address', 'death_year', 'death_month', 'death_day', 'education', 'religion', 'mother_tongue', 'marital_status', 'ctz_no', 'ctz_year', 'ctz_month', 'ctz_day', 'ctz_district', 'grand_fname', 'grand_mname', 'grand_lname', 'father_fname', 'father_mname', 'father_lname', 'spouse_fname', 'spouse_mname', 'spouse_lname', 'reason_of_death', 'inf_fname', 'inf_mname', 'inf_lname', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'd_scanned_image'], 'safe'],
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
        $query = Death::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
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
            'ward' => $this->ward,
        ]);

        $query->orFilterWhere(['like', 'district', $this->deathsearch])
            ->orFilterWhere(['like', 'local_level', $this->deathsearch])
            ->orFilterWhere(['like', 'reg_no', $this->deathsearch])
            ->orFilterWhere(['like', 'reg_year', $this->deathsearch])
            ->orFilterWhere(['like', 'reg_month', $this->deathsearch])
            ->orFilterWhere(['like', 'reg_day', $this->deathsearch])
            ->orFilterWhere(['like', 'registrar_name', $this->deathsearch])
            ->orFilterWhere(['like', 'fname', $this->deathsearch])
            ->orFilterWhere(['like', 'mname', $this->deathsearch])
            ->orFilterWhere(['like', 'lname', $this->deathsearch])
            ->orFilterWhere(['like', 'birth_year', $this->deathsearch])
            ->orFilterWhere(['like', 'birth_month', $this->deathsearch])
            ->orFilterWhere(['like', 'birth_day', $this->deathsearch])
            ->orFilterWhere(['like', 'gender', $this->deathsearch])
            ->orFilterWhere(['like', 'place_of_death', $this->deathsearch])
            ->orFilterWhere(['like', 'permanent_address', $this->deathsearch])
            ->orFilterWhere(['like', 'death_year', $this->deathsearch])
            ->orFilterWhere(['like', 'death_month', $this->deathsearch])
            ->orFilterWhere(['like', 'death_day', $this->deathsearch])
            ->orFilterWhere(['like', 'education', $this->deathsearch])
            ->orFilterWhere(['like', 'religion', $this->deathsearch])
            ->orFilterWhere(['like', 'mother_tongue', $this->mother_tongue])
            ->orFilterWhere(['like', 'marital_status', $this->marital_status])
            ->orFilterWhere(['like', 'ctz_no', $this->deathsearch])
            ->orFilterWhere(['like', 'ctz_year', $this->deathsearch])
            ->orFilterWhere(['like', 'ctz_month', $this->deathsearch])
            ->orFilterWhere(['like', 'ctz_day', $this->deathsearch])
            ->orFilterWhere(['like', 'ctz_district', $this->deathsearch])
            ->orFilterWhere(['like', 'grand_fname', $this->deathsearch])
            ->orFilterWhere(['like', 'grand_mname', $this->deathsearch])
            ->orFilterWhere(['like', 'grand_lname', $this->deathsearch])
            ->orFilterWhere(['like', 'father_fname', $this->deathsearch])
            ->orFilterWhere(['like', 'father_mname', $this->deathsearch])
            ->orFilterWhere(['like', 'father_lname', $this->deathsearch])
            ->orFilterWhere(['like', 'spouse_fname', $this->deathsearch])
            ->orFilterWhere(['like', 'spouse_mname', $this->deathsearch])
            ->orFilterWhere(['like', 'spouse_lname', $this->deathsearch])
            ->orFilterWhere(['like', 'reason_of_death', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_fname', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_mname', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_lname', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_ctz_no', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_ctz_year', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_ctz_month', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_ctz_day', $this->deathsearch])
            ->orFilterWhere(['like', 'inf_ctz_district', $this->deathsearch])
            ->orFilterWhere(['like', 'd_scanned_image', $this->d_scanned_image]);

        return $dataProvider;
    }
}
