<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MessageThread]].
 *
 * @see MessageThread
 */
class MessageThreadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MessageThread[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MessageThread|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
