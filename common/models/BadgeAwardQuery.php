<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[BadgeAward]].
 *
 * @see BadgeAward
 */
class BadgeAwardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BadgeAward[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BadgeAward|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
