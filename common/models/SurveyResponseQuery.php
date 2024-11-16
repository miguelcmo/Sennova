<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyResponse]].
 *
 * @see SurveyResponse
 */
class SurveyResponseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SurveyResponse[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SurveyResponse|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
