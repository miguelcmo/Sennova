<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Certificate]].
 *
 * @see Certificate
 */
class CertificateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Certificate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Certificate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
