<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enrollment".
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property int $enrolled_at
 * @property int|null $dropped_at
 * @property int $status
 * @property int $role
 *
 * @property Course $course
 * @property User $user
 */
class Enrollment extends \yii\db\ActiveRecord
{
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
            [['course_id', 'user_id', 'enrolled_at'], 'required'],
            [['course_id', 'user_id', 'enrolled_at', 'dropped_at', 'status', 'role'], 'integer'],
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
     * {@inheritdoc}
     * @return EnrollmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnrollmentQuery(get_called_class());
    }
}
