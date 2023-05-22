<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fam;

/**
 * FamSearch represents the model behind the search form of `app\models\Fam`.
 */
class FamSearch extends Fam
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inf_id'], 'integer'],
            [['mem_fname', 'mem_mname', 'mem_lname', 'birth_year', 'birth_month', 'birth_day', 'mem_birth_place', 'mem_gender', 'relation_with_inf'], 'safe'],
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
        $query = Fam::find();

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
            'inf_id' => $this->inf_id,
        ]);

        $query->andFilterWhere(['like', 'mem_fname', $this->mem_fname])
            ->andFilterWhere(['like', 'mem_mname', $this->mem_mname])
            ->andFilterWhere(['like', 'mem_lname', $this->mem_lname])
            ->andFilterWhere(['like', 'birth_year', $this->birth_year])
            ->andFilterWhere(['like', 'birth_month', $this->birth_month])
            ->andFilterWhere(['like', 'birth_day', $this->birth_day])
            ->andFilterWhere(['like', 'mem_birth_place', $this->mem_birth_place])
            ->andFilterWhere(['like', 'mem_gender', $this->mem_gender])
            ->andFilterWhere(['like', 'relation_with_inf', $this->relation_with_inf]);

        return $dataProvider;
    }
}