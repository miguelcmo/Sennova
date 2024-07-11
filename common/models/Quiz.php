<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string|null $description
 * @property int|null $time_limit
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Course $course
 * @property QuizAttempt[] $quizAttempts
 * @property QuizQuestion[] $quizQuestions
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'title', 'created_at', 'updated_at'], 'required'],
            [['course_id', 'time_limit', 'status', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
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
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'time_limit' => Yii::t('app', 'Time Limit'),
            'status' => Yii::t('app', 'Status'),
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
     * Gets query for [[QuizAttempts]].
     *
     * @return \yii\db\ActiveQuery|QuizAttemptQuery
     */
    public function getQuizAttempts()
    {
        return $this->hasMany(QuizAttempt::class, ['quiz_id' => 'id']);
    }

    /**
     * Gets query for [[QuizQuestions]].
     *
     * @return \yii\db\ActiveQuery|QuizQuestionQuery
     */
    public function getQuizQuestions()
    {
        return $this->hasMany(QuizQuestion::class, ['quiz_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return QuizQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuizQuery(get_called_class());
    }
}
