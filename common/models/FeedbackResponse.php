<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback_response".
 *
 * @property int $id
 * @property int $feedback_id
 * @property int $user_id
 * @property string $response
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Feedback $feedback
 * @property User $user
 */
class FeedbackResponse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback_id', 'user_id', 'response', 'created_at', 'updated_at'], 'required'],
            [['feedback_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['response'], 'string'],
            [['feedback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feedback::class, 'targetAttribute' => ['feedback_id' => 'id']],
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
            'feedback_id' => Yii::t('app', 'Feedback ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'response' => Yii::t('app', 'Response'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Feedback]].
     *
     * @return \yii\db\ActiveQuery|FeedbackQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::class, ['id' => 'feedback_id']);
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
     * @return FeedbackResponseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedbackResponseQuery(get_called_class());
    }
}
