<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "survey_response".
 *
 * @property int $id
 * @property int $survey_id
 * @property int $user_id
 * @property float|null $total_score
 * @property string|null $status
 * @property string|null $created_at
 *
 * @property Survey $survey
 * @property SurveyResponseAnswer[] $surveyResponseAnswers
 * @property User $user
 */
class SurveyResponse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['survey_id', 'user_id'], 'required'],
            [['survey_id', 'user_id'], 'integer'],
            [['total_score'], 'number'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['survey_id'], 'exist', 'skipOnError' => true, 'targetClass' => Survey::class, 'targetAttribute' => ['survey_id' => 'id']],
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
            'survey_id' => Yii::t('app', 'Survey ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'total_score' => Yii::t('app', 'Total Score'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
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
     * Gets query for [[SurveyResponseAnswers]].
     *
     * @return \yii\db\ActiveQuery|SurveyResponseAnswerQuery
     */
    public function getSurveyResponseAnswers()
    {
        return $this->hasMany(SurveyResponseAnswer::class, ['response_id' => 'id']);
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
     * @return SurveyResponseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyResponseQuery(get_called_class());
    }
}
