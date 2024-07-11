<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "badge_award".
 *
 * @property int $id
 * @property int $badge_id
 * @property int $user_id
 * @property int $awarded_at
 *
 * @property Badge $badge
 * @property User $user
 */
class BadgeAward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'badge_award';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['badge_id', 'user_id', 'awarded_at'], 'required'],
            [['badge_id', 'user_id', 'awarded_at'], 'integer'],
            [['badge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Badge::class, 'targetAttribute' => ['badge_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'badge_id' => Yii::t('app', 'Badge ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'awarded_at' => Yii::t('app', 'Awarded At'),
        ];
    }

    /**
     * Gets query for [[Badge]].
     *
     * @return \yii\db\ActiveQuery|BadgeQuery
     */
    public function getBadge()
    {
        return $this->hasOne(Badge::class, ['id' => 'badge_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return BadgeAwardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BadgeAwardQuery(get_called_class());
    }
}
