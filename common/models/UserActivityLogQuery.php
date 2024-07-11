<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserActivityLog]].
 *
 * @see UserActivityLog
 */
class UserActivityLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserActivityLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserActivityLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
