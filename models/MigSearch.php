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
            [['inf_fname', 'migsearch', 'inf_mname', 'inf_lname', 'inf_fname_eng', 'inf_mname_eng', 'inf_lname_eng', 'registrar_name', 'reg_no', 'reg_year', 'reg_month', 'reg_day', 'ad_reg_year', 'ad_reg_month', 'ad_reg_day', 'inf_birth_year', 'inf_birth_month', 'inf_birth_day', 'ad_inf_birth_year', 'ad_inf_birth_month', 'ad_inf_birth_day', 'inf_gender', 'inf_birth_place', 'inf_education', 'inf_ctz_no', 'inf_ctz_year', 'inf_ctz_month', 'inf_ctz_day', 'ad_inf_ctz_year', 'ad_inf_ctz_month', 'ad_inf_ctz_day', 'inf_ctz_district', 'inf_occupation', 'inf_religion', 'inf_mother_tongue', 'going_district', 'going_local_level', 'going_ward', 'coming_district', 'coming_local_level', 'coming_ward', 'migration_year', 'migration_month', 'migration_day', 'ad_migration_year', 'ad_migration_month', 'ad_migration_day', 'reason', 'm_scanned_image', 'district', 'local_level', 'ward'], 'safe'],
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

        $query->andFilterWhere(['like', 'inf_fname', $this->inf_fname])
            ->andFilterWhere(['like', 'inf_mname', $this->inf_mname])
            ->andFilterWhere(['like', 'inf_lname', $this->inf_lname])
            ->andFilterWhere(['like', 'inf_fname_eng', $this->inf_fname_eng])
            ->andFilterWhere(['like', 'inf_mname_eng', $this->inf_mname_eng])
            ->andFilterWhere(['like', 'inf_lname_eng', $this->inf_lname_eng])
            ->andFilterWhere(['like', 'registrar_name', $this->registrar_name])
            ->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'reg_year', $this->reg_year])
            ->andFilterWhere(['like', 'reg_month', $this->reg_month])
            ->andFilterWhere(['like', 'reg_day', $this->reg_day])
            ->andFilterWhere(['like', 'ad_reg_year', $this->ad_reg_year])
            ->andFilterWhere(['like', 'ad_reg_month', $this->ad_reg_month])
            ->andFilterWhere(['like', 'ad_reg_day', $this->ad_reg_day])
            ->andFilterWhere(['like', 'inf_birth_year', $this->inf_birth_year])
            ->andFilterWhere(['like', 'inf_birth_month', $this->inf_birth_month])
            ->andFilterWhere(['like', 'inf_birth_day', $this->inf_birth_day])
            ->andFilterWhere(['like', 'ad_inf_birth_year', $this->ad_inf_birth_year])
            ->andFilterWhere(['like', 'ad_inf_birth_month', $this->ad_inf_birth_month])
            ->andFilterWhere(['like', 'ad_inf_birth_day', $this->ad_inf_birth_day])
            ->andFilterWhere(['like', 'inf_gender', $this->inf_gender])
            ->andFilterWhere(['like', 'inf_birth_place', $this->inf_birth_place])
            ->andFilterWhere(['like', 'inf_education', $this->inf_education])
            ->andFilterWhere(['like', 'inf_ctz_no', $this->inf_ctz_no])
            ->andFilterWhere(['like', 'inf_ctz_year', $this->inf_ctz_year])
            ->andFilterWhere(['like', 'inf_ctz_month', $this->inf_ctz_month])
            ->andFilterWhere(['like', 'inf_ctz_day', $this->inf_ctz_day])
            ->andFilterWhere(['like', 'ad_inf_ctz_year', $this->ad_inf_ctz_year])
            ->andFilterWhere(['like', 'ad_inf_ctz_month', $this->ad_inf_ctz_month])
            ->andFilterWhere(['like', 'ad_inf_ctz_day', $this->ad_inf_ctz_day])
            ->andFilterWhere(['like', 'inf_ctz_district', $this->inf_ctz_district])
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
            ->andFilterWhere(['like', 'ad_migration_year', $this->ad_migration_year])
            ->andFilterWhere(['like', 'ad_migration_month', $this->ad_migration_month])
            ->andFilterWhere(['like', 'ad_migration_day', $this->ad_migration_day])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'm_scanned_image', $this->m_scanned_image])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'local_level', $this->local_level])
            ->andFilterWhere(['like', 'ward', $this->ward]);

        return $dataProvider;
    }
}
