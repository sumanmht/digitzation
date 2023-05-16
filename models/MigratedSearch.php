<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Migrated;

/**
 * MigratedSearch represents the model behind the search form of `app\models\Migrated`.
 */
class MigratedSearch extends Migrated
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['registrar_name', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'inf_fname', 'inf_mname', 'inf_lname', 'inf_birth_year', 'inf_birth_month', 'inf_birth_day', 'inf_gender', 'inf_birth_place', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'inf_ctz_district', 'inf_education', 'inf_occupation', 'inf_religion', 'inf_mother_tongue', 'going_district', 'going_local_level', 'going_ward', 'coming_district', 'coming_local_level', 'coming_ward', 'migration_year', 'migration_month', 'migration_day', 'reason', 'migration_scanned_image'], 'safe'],
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
        $query = Migrated::find();

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
        ]);

        $query->andFilterWhere(['like', 'registrar_name', $this->registrar_name])
            ->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'reg_year', $this->reg_year])
            ->andFilterWhere(['like', 'reg_month', $this->reg_month])
            ->andFilterWhere(['like', 'reg_day', $this->reg_day])
            ->andFilterWhere(['like', 'inf_fname', $this->inf_fname])
            ->andFilterWhere(['like', 'inf_mname', $this->inf_mname])
            ->andFilterWhere(['like', 'inf_lname', $this->inf_lname])
            ->andFilterWhere(['like', 'inf_birth_year', $this->inf_birth_year])
            ->andFilterWhere(['like', 'inf_birth_month', $this->inf_birth_month])
            ->andFilterWhere(['like', 'inf_birth_day', $this->inf_birth_day])
            ->andFilterWhere(['like', 'inf_gender', $this->inf_gender])
            ->andFilterWhere(['like', 'inf_birth_place', $this->inf_birth_place])
            ->andFilterWhere(['like', 'inf_ctz_no', $this->inf_ctz_no])
            ->andFilterWhere(['like', 'inf_ctz_year', $this->inf_ctz_year])
            ->andFilterWhere(['like', 'inf_ctz_month', $this->inf_ctz_month])
            ->andFilterWhere(['like', 'inf_ctz_day', $this->inf_ctz_day])
            ->andFilterWhere(['like', 'inf_ctz_district', $this->inf_ctz_district])
            ->andFilterWhere(['like', 'inf_education', $this->inf_education])
            ->andFilterWhere(['like', 'inf_occupation', $this->inf_occupation])
            ->andFilterWhere(['like', 'inf_religion', $this->inf_religion])
            ->andFilterWhere(['like', 'inf_mother_tongue', $this->inf_mother_tongue])
            ->andFilterWhere(['like', 'going_district', $this->going_district])
            ->andFilterWhere(['like', 'going_local_level', $this->going_local_level])
            ->andFilterWhere(['like', 'going_ward', $this->going_ward])
            ->andFilterWhere(['like', 'coming_district', $this->coming_district])
            ->andFilterWhere(['like', 'coming_local_level', $this->coming_local_level])
            ->andFilterWhere(['like', 'coming_ward', $this->coming_ward])
            ->andFilterWhere(['like', 'migration_year', $this->migration_year])
            ->andFilterWhere(['like', 'migration_month', $this->migration_month])
            ->andFilterWhere(['like', 'migration_day', $this->migration_day])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'migration_scanned_image', $this->migration_scanned_image]);

        return $dataProvider;
    }
}
