<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyQuestion]].
 *
 * @see SurveyQuestion
 */
class SurveyQuestionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SurveyQuestion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SurveyQuestion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
