<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enrollment".
 *
 * @property int $id 
 * @property int $course_id
 * @property int $user_id
 * @property string|null $enrolled_at
 * @property string|null $dropped_at
 * @property int|null $status
 * @property int|null $role
 *
 * @property Course $course
 * @property User $user
 */
class Enrollment extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enrollment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //['id', 'required'],
            ['user_id', 'required', 'message' => Yii::t('app', 'User name cannot be empty.')],
            ['course_id', 'required', 'message' => Yii::t('app', 'Course name cannot be empty.')],
            //[['course_id', 'user_id'], 'required'],
            [['id', 'course_id', 'user_id', 'status', 'role'], 'integer'],
            //[['id'], 'unique'], 
            [['enrolled_at', 'dropped_at'], 'safe'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
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
            'course_id' => Yii::t('app', 'Course ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'enrolled_at' => Yii::t('app', 'Enrolled At'),
            'dropped_at' => Yii::t('app', 'Dropped At'),
            'status' => Yii::t('app', 'Status'),
            'role' => Yii::t('app', 'Role'),
        ];
    }

    /**
     * Gets the human-readable status label for the user.
     *
     * @return string The status label (Active, Inactive, or Deleted).
     */
    public function getStatusLabel()
    {
        $statuses = [
            self::STATUS_DELETED => Yii::t('app', 'Deleted'),
            self::STATUS_INACTIVE => Yii::t('app', 'Innactive'),
            self::STATUS_ACTIVE => Yii::t('app', 'Active'),
        ];

        return $statuses[$this->status] ?? Yii::t('app', 'Unknown');
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
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
     * Gets query for [[Mentorship]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getMentorships()
    {
        return $this->hasMany(Mentorship::class, ['enrollment_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return EnrollmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnrollmentQuery(get_called_class());
    }
}
