<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyResponseAnswer]].
 *
 * @see SurveyResponseAnswer
 */
class SurveyResponseAnswerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SurveyResponseAnswer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SurveyResponseAnswer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
