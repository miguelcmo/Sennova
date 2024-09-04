<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $section_id
 * @property string $question_text
 * @property string $question_type
 * @property int|null $points
 * @property string|null $hint
 * @property string|null $explanation
 * @property string|null $media_type
 * @property string|null $media_url
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Answers[] $answers
 * @property Options[] $options
 * @property Responses[] $responses
 * @property Section $section
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'question_text', 'question_type'], 'required'],
            [['section_id', 'points', 'created_by', 'updated_by'], 'integer'],
            [['question_text', 'question_type', 'hint', 'explanation', 'media_type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['media_url'], 'string', 'max' => 255],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'section_id' => Yii::t('app', 'Section ID'),
            'question_text' => Yii::t('app', 'Question Text'),
            'question_type' => Yii::t('app', 'Question Type'),
            'points' => Yii::t('app', 'Points'),
            'hint' => Yii::t('app', 'Hint'),
            'explanation' => Yii::t('app', 'Explanation'),
            'media_type' => Yii::t('app', 'Media Type'),
            'media_url' => Yii::t('app', 'Media Url'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery|AnswersQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::class, ['question_id' => 'id']);
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
     * @return \yii\db\ActiveQuery|SectionQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }

    /**
     * {@inheritdoc}
     * @return QuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }
}
