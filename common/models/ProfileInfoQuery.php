<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProfileInfo]].
 *
 * @see ProfileInfo
 */
class ProfileInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProfileInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProfileInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
