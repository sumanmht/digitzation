<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FamilyMember;

/**
 * FamilyMemberSearch represents the model behind the search form of `app\models\FamilyMember`.
 */
class FamilyMemberSearch extends FamilyMember
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inf_id'], 'integer'],
            [['member_fname', 'member_mname', 'member_lname', 'birth_year', 'birth_month', 'birth_day', 'mem_gender', 'mem_birth_place', 'relation_with_inf'], 'safe'],
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
        $query = FamilyMember::find();

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

        $query->andFilterWhere(['like', 'member_fname', $this->member_fname])
            ->andFilterWhere(['like', 'member_mname', $this->member_mname])
            ->andFilterWhere(['like', 'member_lname', $this->member_lname])
            ->andFilterWhere(['like', 'birth_year', $this->birth_year])
            ->andFilterWhere(['like', 'birth_month', $this->birth_month])
            ->andFilterWhere(['like', 'birth_day', $this->birth_day])
            ->andFilterWhere(['like', 'mem_gender', $this->mem_gender])
            ->andFilterWhere(['like', 'mem_birth_place', $this->mem_birth_place])
            ->andFilterWhere(['like', 'relation_with_inf', $this->relation_with_inf]);

        return $dataProvider;
    }
}
