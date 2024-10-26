<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Enrollment]].
 *
 * @see Enrollment
 */
class EnrollmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Enrollment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Enrollment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
