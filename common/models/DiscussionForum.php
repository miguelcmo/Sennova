<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discussion_forum".
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string|null $description
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Course $course
 * @property User $createdBy
 * @property DiscussionTopic[] $discussionTopics
 */
class DiscussionForum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discussion_forum';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'title', 'created_by', 'created_at', 'updated_at'], 'required'],
            [['course_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
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
     * Gets query for [[DiscussionTopics]].
     *
     * @return \yii\db\ActiveQuery|DiscussionTopicQuery
     */
    public function getDiscussionTopics()
    {
        return $this->hasMany(DiscussionTopic::class, ['forum_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DiscussionForumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DiscussionForumQuery(get_called_class());
    }
}
