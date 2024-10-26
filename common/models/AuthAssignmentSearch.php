<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AuthAssignment;

/**
 * AuthAssignmentSearch represents the model behind the search form of `common\models\AuthAssignment`.
 */
class AuthAssignmentSearch extends AuthAssignment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name'], 'safe'],
            [['user_id', 'created_at'], 'integer'],
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
        $query = AuthAssignment::find();

        // add conditions that should always apply here
        // Filtrar usuarios que no son superadmin
        $auth = Yii::$app->authManager;
        $superAdminRole = $auth->getRole('superadmin');
        
        // Obtener IDs de usuarios con el rol de superadmin
        $superAdminUsers = $auth->getUserIdsByRole($superAdminRole->name);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Excluir superadmins de la consulta
        $query->andWhere(['not in', 'user_id', $superAdminUsers]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }
}
