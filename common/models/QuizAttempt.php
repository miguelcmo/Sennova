<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quiz_attempt".
 *
 * @property int $id
 * @property int $quiz_id
 * @property int $user_id
 * @property int $started_at
 * @property int|null $finished_at
 * @property int $status
 * @property int|null $score
 * @property int|null $is_passed
 *
 * @property Quiz $quiz
 * @property QuizGrade[] $quizGrades
 * @property User $user
 */
class QuizAttempt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_attempt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_id', 'user_id', 'started_at'], 'required'],
            [['quiz_id', 'user_id', 'started_at', 'finished_at', 'status', 'score', 'is_passed'], 'integer'],
            [['quiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quiz::class, 'targetAttribute' => ['quiz_id' => 'id']],
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
            'quiz_id' => Yii::t('app', 'Quiz ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'started_at' => Yii::t('app', 'Started At'),
            'finished_at' => Yii::t('app', 'Finished At'),
            'status' => Yii::t('app', 'Status'),
            'score' => Yii::t('app', 'Score'),
            'is_passed' => Yii::t('app', 'Is Passed'),
        ];
    }

    /**
     * Gets query for [[Quiz]].
     *
     * @return \yii\db\ActiveQuery|QuizQuery
     */
    public function getQuiz()
    {
        return $this->hasOne(Quiz::class, ['id' => 'quiz_id']);
    }

    /**
     * Gets query for [[QuizGrades]].
     *
     * @return \yii\db\ActiveQuery|QuizGradeQuery
     */
    public function getQuizGrades()
    {
        return $this->hasMany(QuizGrade::class, ['quiz_attempt_id' => 'id']);
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
     * @return QuizAttemptQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuizAttemptQuery(get_called_class());
    }
}
