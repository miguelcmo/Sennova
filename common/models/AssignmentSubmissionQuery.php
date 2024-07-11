<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AssignmentSubmission]].
 *
 * @see AssignmentSubmission
 */
class AssignmentSubmissionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AssignmentSubmission[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AssignmentSubmission|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
