<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discussion_topic".
 *
 * @property int $id
 * @property int $forum_id
 * @property string $title
 * @property string|null $content
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property DiscussionPost[] $discussionPosts
 * @property DiscussionForum $forum
 */
class DiscussionTopic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discussion_topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forum_id', 'title', 'created_by', 'created_at', 'updated_at'], 'required'],
            [['forum_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['forum_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiscussionForum::class, 'targetAttribute' => ['forum_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'forum_id' => Yii::t('app', 'Forum ID'),
            'title' => Yii::t('app', 'Title'),
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
     * Gets query for [[DiscussionPosts]].
     *
     * @return \yii\db\ActiveQuery|DiscussionPostQuery
     */
    public function getDiscussionPosts()
    {
        return $this->hasMany(DiscussionPost::class, ['topic_id' => 'id']);
    }

    /**
     * Gets query for [[Forum]].
     *
     * @return \yii\db\ActiveQuery|DiscussionForumQuery
     */
    public function getForum()
    {
        return $this->hasOne(DiscussionForum::class, ['id' => 'forum_id']);
    }

    /**
     * {@inheritdoc}
     * @return DiscussionTopicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DiscussionTopicQuery(get_called_class());
    }
}
