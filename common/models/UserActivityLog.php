<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_activity_log".
 *
 * @property int $id
 * @property int $user_id
 * @property string $action
 * @property string|null $description
 * @property int $created_at
 *
 * @property User $user
 */
class UserActivityLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_activity_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'action', 'created_at'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['description'], 'string'],
            [['action'], 'string', 'max' => 255],
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
            'user_id' => Yii::t('app', 'User ID'),
            'action' => Yii::t('app', 'Action'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
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
     * @return UserActivityLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserActivityLogQuery(get_called_class());
    }
}
