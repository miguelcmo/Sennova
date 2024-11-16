<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyResponseSelectedOptions]].
 *
 * @see SurveyResponseSelectedOptions
 */
class SurveyResponseSelectedOptionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SurveyResponseSelectedOptions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SurveyResponseSelectedOptions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
