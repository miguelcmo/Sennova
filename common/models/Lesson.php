<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property int $course_module_id
 * @property string $title
 * @property string|null $content
 * @property string|null $video_url
 * @property string|null $attachment
 * @property int|null $sort_order
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CourseModule $courseModule
 * @property LessonResource[] $lessonResources
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_module_id', 'title', 'created_at', 'updated_at'], 'required'],
            [['course_module_id', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title', 'video_url', 'attachment'], 'string', 'max' => 255],
            [['course_module_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseModule::class, 'targetAttribute' => ['course_module_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_module_id' => Yii::t('app', 'Course Module ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'video_url' => Yii::t('app', 'Video Url'),
            'attachment' => Yii::t('app', 'Attachment'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[CourseModule]].
     *
     * @return \yii\db\ActiveQuery|CourseModuleQuery
     */
    public function getCourseModule()
    {
        return $this->hasOne(CourseModule::class, ['id' => 'course_module_id']);
    }

    /**
     * Gets query for [[LessonResources]].
     *
     * @return \yii\db\ActiveQuery|LessonResourceQuery
     */
    public function getLessonResources()
    {
        return $this->hasMany(LessonResource::class, ['lesson_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LessonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LessonQuery(get_called_class());
    }
}
