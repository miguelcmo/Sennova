<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "survey_question".
 *
 * @property int $id
 * @property int $survey_id
 * @property int $section_id
 * @property string $question_text
 * @property string $question_type
 * @property int|null $points
 * @property string|null $hint
 * @property string|null $explanation
 * @property string|null $media_type
 * @property string|null $media_url
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Options[] $options
 * @property Responses[] $responses
 * @property SurveySection $section
 * @property Survey $survey
 * @property SurveyAnswers[] $surveyAnswers
 */
class SurveyQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['survey_id', 'section_id', 'question_text', 'question_type'], 'required'],
            [['survey_id', 'section_id', 'created_by', 'updated_by'], 'integer'],
            [['question_text', 'question_type', 'hint', 'explanation', 'media_type'], 'string'],
            ['points', 'integer', 'min' => 0, 'message' => Yii::t('app', 'Points cannot be less than zero.')],
            [['created_at', 'updated_at'], 'safe'],
            [['media_url'], 'string', 'max' => 255],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => SurveySection::class, 'targetAttribute' => ['section_id' => 'id']],
            [['survey_id'], 'exist', 'skipOnError' => true, 'targetClass' => Survey::class, 'targetAttribute' => ['survey_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'survey_id' => Yii::t('app', 'Survey ID'),
            'section_id' => Yii::t('app', 'Section ID'),
            'question_text' => Yii::t('app', 'Question Text'),
            'question_type' => Yii::t('app', 'Question Type'),
            'points' => Yii::t('app', 'Points'),
            'hint' => Yii::t('app', 'Hint'),
            'explanation' => Yii::t('app', 'Explanation'),
            'media_type' => Yii::t('app', 'Media Type'),
            'media_url' => Yii::t('app', 'Media Url'),
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
     * Gets query for [[Options]].
     *
     * @return \yii\db\ActiveQuery|OptionsQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Options::class, ['question_id' => 'id']);
    }

    /**
     * Gets query for [[Responses]].
     *
     * @return \yii\db\ActiveQuery|ResponsesQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Responses::class, ['question_id' => 'id']);
    }

    /**
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery|SurveySectionQuery
     */
    public function getSection()
    {
        return $this->hasOne(SurveySection::class, ['id' => 'section_id']);
    }

    /**
     * Gets query for [[Survey]].
     *
     * @return \yii\db\ActiveQuery|SurveyQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(Survey::class, ['id' => 'survey_id']);
    }

    /**
     * Gets query for [[SurveyAnswers]].
     *
     * @return \yii\db\ActiveQuery|SurveyAnswersQuery
     */
    public function getSurveyAnswers()
    {
        return $this->hasMany(SurveyAnswers::class, ['question_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SurveyQuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyQuestionQuery(get_called_class());
    }

    /**
     * Devuelve la etiqueta traducida para el tipo de pregunta
     * 
     * @return string
     */
    public function getQuestionTypeLabel()
    {
        $labels = [
            'short_text' => Yii::t('app', 'Short Text'),
            'paragraph' => Yii::t('app', 'Paragraph'),
            'multiple_choice' => Yii::t('app', 'Multiple Choice'),
            'checkbox' => Yii::t('app', 'Checkbox'),
            'drop_down_list' => Yii::t('app', 'Drop Down List'),
            'true_false' => Yii::t('app', 'True/False'),
            'date' => Yii::t('app', 'Date'),
            'email' => Yii::t('app', 'Email'),
            'number' => Yii::t('app', 'Number'),
            'time' => Yii::t('app', 'Time'),
            'url' => Yii::t('app', 'URL')
        ];

        // Retorna la etiqueta correspondiente al tipo de pregunta actual
        return $labels[$this->question_type] ?? Yii::t('app', 'Unknown');
    }
}
