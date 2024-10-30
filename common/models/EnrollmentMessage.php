<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "enrollment_message".
 *
 * @property int $id
 * @property int $enrollment_id
 * @property int $sender_id
 * @property string $message
 * @property int|null $read_status
 * @property int|null $parent_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Enrollment $enrollment
 * @property User $sender
 */
class EnrollmentMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enrollment_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enrollment_id', 'sender_id', 'message'], 'required'],
            [['enrollment_id', 'sender_id', 'read_status', 'parent_id', 'created_by', 'updated_by'], 'integer'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['sender_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['sender_id' => 'id']],
            [['enrollment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enrollment::class, 'targetAttribute' => ['enrollment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'enrollment_id' => Yii::t('app', 'Enrollment ID'),
            'sender_id' => Yii::t('app', 'Sender ID'),
            'message' => Yii::t('app', 'Message'),
            'read_status' => Yii::t('app', 'Read Status'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Gets query for [[Enrollment]].
     *
     * @return \yii\db\ActiveQuery|EnrollmentQuery
     */
    public function getEnrollment()
    {
        return $this->hasOne(Enrollment::class, ['id' => 'enrollment_id']);
    }

    /**
     * Gets query for [[Sender]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getSender()
    {
        return $this->hasOne(User::class, ['id' => 'sender_id']);
    }

    /**
     * {@inheritdoc}
     * @return EnrollmentMessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnrollmentMessageQuery(get_called_class());
    }
}
