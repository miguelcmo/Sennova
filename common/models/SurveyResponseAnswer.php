<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "survey_response_answer".
 *
 * @property int $id
 * @property int $response_id
 * @property int $question_id
 * @property string|null $answer_text
 * @property float|null $calculated_score
 * @property string|null $created_at
 *
 * @property SurveyQuestion $question
 * @property SurveyResponse $response
 * @property SurveyResponseSelectedOptions[] $surveyResponseSelectedOptions
 */
class SurveyResponseAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_response_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['response_id', 'question_id'], 'required'],
            [['response_id', 'question_id'], 'integer'],
            [['answer_text'], 'string'],
            [['calculated_score'], 'number'],
            [['created_at'], 'safe'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => SurveyQuestion::class, 'targetAttribute' => ['question_id' => 'id']],
            [['response_id'], 'exist', 'skipOnError' => true, 'targetClass' => SurveyResponse::class, 'targetAttribute' => ['response_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'response_id' => Yii::t('app', 'Response ID'),
            'question_id' => Yii::t('app', 'Question ID'),
            'answer_text' => Yii::t('app', 'Answer Text'),
            'calculated_score' => Yii::t('app', 'Calculated Score'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery|SurveyQuestionQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(SurveyQuestion::class, ['id' => 'question_id']);
    }

    /**
     * Gets query for [[Response]].
     *
     * @return \yii\db\ActiveQuery|SurveyResponseQuery
     */
    public function getResponse()
    {
        return $this->hasOne(SurveyResponse::class, ['id' => 'response_id']);
    }

    /**
     * Gets query for [[SurveyResponseSelectedOptions]].
     *
     * @return \yii\db\ActiveQuery|SurveyResponseSelectedOptionsQuery
     */
    public function getSurveyResponseSelectedOptions()
    {
        return $this->hasMany(SurveyResponseSelectedOptions::class, ['response_answer_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SurveyResponseAnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyResponseAnswerQuery(get_called_class());
    }
}
