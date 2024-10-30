<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Mentorship]].
 *
 * @see Mentorship
 */
class MentorshipQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Mentorship[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Mentorship|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
