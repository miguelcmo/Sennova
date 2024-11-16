<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "survey_response_selected_options".
 *
 * @property int $id
 * @property int $response_answer_id
 * @property int $option_id
 * @property string|null $created_at
 *
 * @property SurveyOption $option
 * @property SurveyResponseAnswer $responseAnswer
 */
class SurveyResponseSelectedOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_response_selected_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['response_answer_id', 'option_id'], 'required'],
            [['response_answer_id', 'option_id'], 'integer'],
            [['created_at'], 'safe'],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => SurveyOption::class, 'targetAttribute' => ['option_id' => 'id']],
            [['response_answer_id'], 'exist', 'skipOnError' => true, 'targetClass' => SurveyResponseAnswer::class, 'targetAttribute' => ['response_answer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'response_answer_id' => Yii::t('app', 'Response Answer ID'),
            'option_id' => Yii::t('app', 'Option ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Option]].
     *
     * @return \yii\db\ActiveQuery|SurveyOptionQuery
     */
    public function getOption()
    {
        return $this->hasOne(SurveyOption::class, ['id' => 'option_id']);
    }

    /**
     * Gets query for [[ResponseAnswer]].
     *
     * @return \yii\db\ActiveQuery|SurveyResponseAnswerQuery
     */
    public function getResponseAnswer()
    {
        return $this->hasOne(SurveyResponseAnswer::class, ['id' => 'response_answer_id']);
    }

    /**
     * {@inheritdoc}
     * @return SurveyResponseSelectedOptionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SurveyResponseSelectedOptionsQuery(get_called_class());
    }
}
