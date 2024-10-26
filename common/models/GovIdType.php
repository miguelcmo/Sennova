<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gov_id_type".
 *
 * @property int $id
 * @property string|null $short_name
 * @property string|null $name
 *
 * @property Profile[] $profiles
 */
class GovIdType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gov_id_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['short_name', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'short_name' => Yii::t('app', 'Short Name'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::class, ['gov_id_type' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return GovIdTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GovIdTypeQuery(get_called_class());
    }
}
