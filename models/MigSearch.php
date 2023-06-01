<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mig;

/**
 * MigSearch represents the model behind the search form of `app\models\Mig`.
 */
class MigSearch extends Mig
{
    /**
     * {@inheritdoc}
     */

    public $migsearch;
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['inf_fname', 'migsearch', 'inf_mname', 'inf_lname', 'registrar_name', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'inf_birth_year', 'inf_birth_month', 'inf_birth_day', 'inf_gender', 'inf_birth_place', 'inf_education', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'inf_occupation', 'inf_religion', 'inf_mother_tongue', 'going_district', 'going_local_level', 'going_ward', 'coming_district', 'coming_local_level', 'coming_ward', 'migration_year', 'migration_month', 'migration_day', 'reason', 'm_scanned_image'], 'safe'],
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
        $query = Mig::find();

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
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'reg_year' => $this->reg_year,
        //     'reg_month' => $this->reg_month,
        //     'reg_day' => $this->reg_day,
        //     'inf_birth_year' => $this->inf_birth_year,
        //     'inf_birth_month' => $this->inf_birth_month,
        //     'inf_birth_day' => $this->inf_birth_day,
        //     'inf_fname' => $this->inf_fname,
        //     'inf_mname' => $this->inf_mname,
        //     'inf_lname' => $this->inf_lname,
        //     'going_district' => $this->going_district,
        //     'going_local_level' => $this->going_local_level,
        //     'going_ward' => $this->going_ward,
        //     'coming_district' => $this->coming_district,
        //     'coming_local_level' => $this->coming_local_level,
        //     'coming_ward' => $this->coming_ward,
        //     'migration_year' => $this->migration_year,
        //     'migration_month' => $this->migration_month,
        //     'migration_day' => $this->migration_day,
        // ]);

        $query->orFilterWhere(['like', 'inf_fname', $this->migsearch])
            ->orFilterWhere(['like', 'inf_mname', $this->migsearch])
            ->orFilterWhere(['like', 'inf_lname', $this->migsearch])
            ->orFilterWhere(['like', 'registrar_name', $this->migsearch])
            ->orFilterWhere(['like', 'reg_no', $this->migsearch])
            ->orFilterWhere(['like', 'reg_year', $this->migsearch])
            ->orFilterWhere(['like', 'reg_month', $this->migsearch])
            ->orFilterWhere(['like', 'reg_day', $this->migsearch])
            ->orFilterWhere(['like', 'inf_birth_year', $this->migsearch])
            ->orFilterWhere(['like', 'inf_birth_month', $this->migsearch])
            ->orFilterWhere(['like', 'inf_birth_day', $this->migsearch])
            ->orFilterWhere(['like', 'inf_gender', $this->inf_gender])
            ->orFilterWhere(['like', 'inf_birth_place', $this->inf_birth_place])
            ->orFilterWhere(['like', 'inf_education', $this->inf_education])
            ->orFilterWhere(['like', 'inf_ctz_no', $this->inf_ctz_no])
            ->orFilterWhere(['like', 'inf_ctz_year', $this->inf_ctz_year])
            ->orFilterWhere(['like', 'inf_ctz_month', $this->inf_ctz_month])
            ->orFilterWhere(['like', 'inf_ctz_day', $this->inf_ctz_day])
            ->orFilterWhere(['like', 'inf_ctz_district', $this->inf_ctz_district])
            ->orFilterWhere(['like', 'inf_occupation', $this->inf_occupation])
            ->orFilterWhere(['like', 'inf_religion', $this->inf_religion])
            ->orFilterWhere(['like', 'inf_mother_tongue', $this->inf_mother_tongue])
            ->orFilterWhere(['like', 'going_district', $this->migsearch])
            ->orFilterWhere(['like', 'going_local_level', $this->migsearch])
            ->orFilterWhere(['like', 'going_ward', $this->migsearch])
            ->orFilterWhere(['like', 'coming_district', $this->migsearch])
            ->orFilterWhere(['like', 'coming_local_level', $this->migsearch])
            ->orFilterWhere(['like', 'coming_ward', $this->migsearch])
            ->orFilterWhere(['like', 'migration_year', $this->migsearch])
            ->orFilterWhere(['like', 'migration_month', $this->migsearch])
            ->orFilterWhere(['like', 'migration_day', $this->migsearch])
            ->orFilterWhere(['like', 'reason', $this->reason])
            ->orFilterWhere(['like', 'm_scanned_image', $this->m_scanned_image]);

        return $dataProvider;
    }
}
