<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_by', 'updated_by'], 'integer'],
            [['firstName', 'lastName', 'govTypeId', 'govId', 'gender', 'initials', 'profession', 'ocupation', 'role', 'alias', 'image', 'email', 'telephone', 'education', 'location', 'skills', 'notes', 'created_at', 'updated_at'], 'safe'],
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
        $query = Profile::find();

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
            'user_id' => $this->user_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'govTypeId', $this->govTypeId])
            ->andFilterWhere(['like', 'govId', $this->govId])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'initials', $this->initials])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'ocupation', $this->ocupation])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'skills', $this->skills])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
