<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[QuizGrade]].
 *
 * @see QuizGrade
 */
class QuizGradeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return QuizGrade[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return QuizGrade|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
