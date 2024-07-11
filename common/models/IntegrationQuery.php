<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Integration]].
 *
 * @see Integration
 */
class IntegrationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Integration[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Integration|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
