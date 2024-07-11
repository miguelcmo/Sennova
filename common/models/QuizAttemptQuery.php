<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[QuizAttempt]].
 *
 * @see QuizAttempt
 */
class QuizAttemptQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return QuizAttempt[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return QuizAttempt|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
