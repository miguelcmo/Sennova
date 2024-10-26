<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GovIdType]].
 *
 * @see GovIdType
 */
class GovIdTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GovIdType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GovIdType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
