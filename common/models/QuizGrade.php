<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quiz_grade".
 *
 * @property int $id
 * @property int $quiz_attempt_id
 * @property int $quiz_question_id
 * @property int $user_id
 * @property int $chosen_option
 * @property int|null $is_correct
 * @property int $points
 *
 * @property QuizAttempt $quizAttempt
 * @property QuizQuestion $quizQuestion
 * @property User $user
 */
class QuizGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_attempt_id', 'quiz_question_id', 'user_id', 'chosen_option'], 'required'],
            [['quiz_attempt_id', 'quiz_question_id', 'user_id', 'chosen_option', 'is_correct', 'points'], 'integer'],
            [['quiz_attempt_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuizAttempt::class, 'targetAttribute' => ['quiz_attempt_id' => 'id']],
            [['quiz_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuizQuestion::class, 'targetAttribute' => ['quiz_question_id' => 'id']],
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
            'quiz_attempt_id' => Yii::t('app', 'Quiz Attempt ID'),
            'quiz_question_id' => Yii::t('app', 'Quiz Question ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'chosen_option' => Yii::t('app', 'Chosen Option'),
            'is_correct' => Yii::t('app', 'Is Correct'),
            'points' => Yii::t('app', 'Points'),
        ];
    }

    /**
     * Gets query for [[QuizAttempt]].
     *
     * @return \yii\db\ActiveQuery|QuizAttemptQuery
     */
    public function getQuizAttempt()
    {
        return $this->hasOne(QuizAttempt::class, ['id' => 'quiz_attempt_id']);
    }

    /**
     * Gets query for [[QuizQuestion]].
     *
     * @return \yii\db\ActiveQuery|QuizQuestionQuery
     */
    public function getQuizQuestion()
    {
        return $this->hasOne(QuizQuestion::class, ['id' => 'quiz_question_id']);
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
     * @return QuizGradeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuizGradeQuery(get_called_class());
    }
}
