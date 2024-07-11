<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quiz_question".
 *
 * @property int $id
 * @property int $quiz_id
 * @property string $question
 * @property string $options
 * @property int $correct_option
 * @property int|null $points
 * @property int|null $sort_order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Quiz $quiz
 * @property QuizGrade[] $quizGrades
 */
class QuizQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_id', 'question', 'options', 'correct_option', 'created_at', 'updated_at'], 'required'],
            [['quiz_id', 'correct_option', 'points', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['question'], 'string'],
            [['options'], 'safe'],
            [['quiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quiz::class, 'targetAttribute' => ['quiz_id' => 'id']],
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
            'question' => Yii::t('app', 'Question'),
            'options' => Yii::t('app', 'Options'),
            'correct_option' => Yii::t('app', 'Correct Option'),
            'points' => Yii::t('app', 'Points'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
        return $this->hasMany(QuizGrade::class, ['quiz_question_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return QuizQuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuizQuestionQuery(get_called_class());
    }
}
