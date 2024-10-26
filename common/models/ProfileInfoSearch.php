<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProfileInfo;

/**
 * ProfileInfoSearch represents the model behind the search form of `common\models\ProfileInfo`.
 */
class ProfileInfoSearch extends ProfileInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'profile_id', 'years_experience', 'visibility', 'created_by', 'updated_by'], 'integer'],
            [['profile_picture', 'bio', 'website', 'social_links', 'occupation', 'company', 'industry', 'created_at', 'updated_at'], 'safe'],
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
        $query = ProfileInfo::find();

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
            'profile_id' => $this->profile_id,
            'years_experience' => $this->years_experience,
            'visibility' => $this->visibility,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'profile_picture', $this->profile_picture])
            ->andFilterWhere(['like', 'bio', $this->bio])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'social_links', $this->social_links])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'industry', $this->industry]);

        return $dataProvider;
    }
}
