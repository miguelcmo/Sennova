<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CourseCompletion]].
 *
 * @see CourseCompletion
 */
class CourseCompletionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CourseCompletion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CourseCompletion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
