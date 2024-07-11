<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[DiscussionForum]].
 *
 * @see DiscussionForum
 */
class DiscussionForumQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DiscussionForum[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DiscussionForum|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
