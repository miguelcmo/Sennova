<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_feedback".
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property int $rating
 * @property string|null $feedback
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Course $course
 * @property User $user
 */
class CourseFeedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id', 'rating', 'created_at', 'updated_at'], 'required'],
            [['course_id', 'user_id', 'rating', 'created_at', 'updated_at'], 'integer'],
            [['feedback'], 'string'],
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
            'rating' => Yii::t('app', 'Rating'),
            'feedback' => Yii::t('app', 'Feedback'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
     * @return CourseFeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseFeedbackQuery(get_called_class());
    }
}
