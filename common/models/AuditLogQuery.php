<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AuditLog]].
 *
 * @see AuditLog
 */
class AuditLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AuditLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AuditLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
