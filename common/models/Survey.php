<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "survey".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $total_points
 * @property string|null $status
 * @property string|null $url
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Responses[] $responses
 * @property SurveyQuestion[] $surveyQuestions
 * @property SurveyResults[] $surveyResults
 * @property SurveySection[] $surveySections
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'status'], 'string'],
            [['total_points', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'total_points' => Yii::t('app', 'Total Points'),
            'status' => Yii::t('app', 'Status'),
            'url' => Yii::t('app', 'Url'),
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
     * Gets query for [[Responses]].
     *
     * @return \yii\db\ActiveQuery|ResponsesQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Responses::class, ['survey_id' => 'id']);
    }

    /**
     * Gets query for [[SurveyQuestions]].
     *
     * @return \yii\db\ActiveQuery|SurveyQuestionQuery
     */
    public function getSurveyQuestions()
    {
        return $this->hasMany(SurveyQuestion::class, ['survey_id' => 'id']);
    }

    /**
     * Gets query for [[SurveyResults]].
     *
     * @return \yii\db\ActiveQuery|SurveyResultsQuery
     */
    public function getSurveyResults()
    {
        return $this->hasMany(SurveyResults::class, ['survey_id' => 'id']);
    }

    /**
     * Gets query for [[SurveySections]].
     *
     * @return \yii\db\ActiveQuery|SurveySectionQuery
     */
    public function getSurveySections()
    {
        return $this->hasMany(SurveySection::class, ['survey_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SurveyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyQuery(get_called_class());
    }
}
