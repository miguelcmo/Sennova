<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SurveyOption]].
 *
 * @see SurveyOption
 */
class SurveyOptionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SurveyOption[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SurveyOption|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
