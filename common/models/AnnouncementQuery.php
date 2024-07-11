<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Announcement]].
 *
 * @see Announcement
 */
class AnnouncementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Announcement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Announcement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
