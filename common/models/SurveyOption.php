<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "survey_option".
 *
 * @property int $id
 * @property int $question_id
 * @property string $option_text
 * @property int $is_correct
 * @property int|null $weight
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property SurveyQuestion $question
 * @property SurveyResponseSelectedOptions[] $surveyResponseSelectedOptions
 */
class SurveyOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'option_text'], 'required'],
            [['question_id', 'is_correct', 'weight', 'created_by', 'updated_by'], 'integer'],
            //['weight', 'integer', 'min' => 0, 'max' => 100],
            [['created_at', 'updated_at'], 'safe'],
            [['option_text'], 'string', 'max' => 500],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => SurveyQuestion::class, 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question_id' => Yii::t('app', 'Question ID'),
            'option_text' => Yii::t('app', 'Option Text'),
            'is_correct' => Yii::t('app', 'Is Correct'),
            'weight' => Yii::t('app', 'Weight'),
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
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery|SurveyQuestionQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(SurveyQuestion::class, ['id' => 'question_id']);
    }

    /**
     * Gets query for [[SurveyResponseSelectedOptions]].
     *
     * @return \yii\db\ActiveQuery|SurveyResponseSelectedOptionsQuery
     */
    public function getSurveyResponseSelectedOptions()
    {
        return $this->hasMany(SurveyResponseSelectedOptions::class, ['option_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SurveyOptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyOptionQuery(get_called_class());
    }
}
