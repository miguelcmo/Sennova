<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity_log".
 *
 * @property int $id
 * @property int $user_id
 * @property string $app
 * @property string $activity_type
 * @property string|null $description
 * @property string $created_at
 * @property string|null $ip_address
 * @property string|null $device
 * @property string|null $browser
 * @property string|null $location
 * @property string|null $additional_data
 *
 * @property User $user
 */
class ActivityLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'app', 'activity_type'], 'required'],
            [['user_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'additional_data'], 'safe'],
            [['app', 'activity_type', 'ip_address', 'device', 'browser', 'location'], 'string', 'max' => 255],
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
            'app' => Yii::t('app', 'App'),
            'activity_type' => Yii::t('app', 'Activity Type'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'ip_address' => Yii::t('app', 'Ip Address'),
            'device' => Yii::t('app', 'Device'),
            'browser' => Yii::t('app', 'Browser'),
            'location' => Yii::t('app', 'Location'),
            'additional_data' => Yii::t('app', 'Additional Data'),
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
     * @return ActivityLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityLogQuery(get_called_class());
    }
}
