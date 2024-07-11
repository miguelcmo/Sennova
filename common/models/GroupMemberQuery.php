<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GroupMember]].
 *
 * @see GroupMember
 */
class GroupMemberQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GroupMember[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GroupMember|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
