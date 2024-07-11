<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Plugin]].
 *
 * @see Plugin
 */
class PluginQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Plugin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Plugin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
