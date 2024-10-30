<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "mentorship".
 *
 * @property int $id
 * @property int $enrollment_id
 * @property int $user_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Enrollment $enrollment
 * @property User $user
 */
class Mentorship extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mentorship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enrollment_id', 'user_id'], 'required'],
            [['enrollment_id', 'user_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['enrollment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enrollment::class, 'targetAttribute' => ['enrollment_id' => 'id']],
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
            'enrollment_id' => Yii::t('app', 'Enrollment ID'),
            'user_id' => Yii::t('app', 'User ID'),
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['user_id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return MentorshipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MentorshipQuery(get_called_class());
    }
}
