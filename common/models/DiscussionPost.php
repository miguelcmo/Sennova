<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discussion_post".
 *
 * @property int $id
 * @property int $topic_id
 * @property string|null $content
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property DiscussionTopic $topic
 */
class DiscussionPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discussion_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topic_id', 'created_by', 'created_at', 'updated_at'], 'required'],
            [['topic_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['topic_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiscussionTopic::class, 'targetAttribute' => ['topic_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'topic_id' => Yii::t('app', 'Topic ID'),
            'content' => Yii::t('app', 'Content'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Topic]].
     *
     * @return \yii\db\ActiveQuery|DiscussionTopicQuery
     */
    public function getTopic()
    {
        return $this->hasOne(DiscussionTopic::class, ['id' => 'topic_id']);
    }

    /**
     * {@inheritdoc}
     * @return DiscussionPostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DiscussionPostQuery(get_called_class());
    }
}
