<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CourseModule]].
 *
 * @see CourseModule
 */
class CourseModuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CourseModule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CourseModule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
