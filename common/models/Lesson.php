<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property int $course_id
 * @property int|null $course_module_id
 * @property string $title
 * @property string|null $content
 * @property string|null $video_url
 * @property string|null $attachment
 * @property int|null $order
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Course $course
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
            [['course_id', 'title'], 'required'],
            [['course_id', 'course_module_id', 'order', 'created_by', 'updated_by'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'video_url', 'attachment'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
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
            'course_id' => Yii::t('app', 'Course ID'),
            'course_module_id' => Yii::t('app', 'Course Module ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'video_url' => Yii::t('app', 'Video Url'),
            'attachment' => Yii::t('app', 'Attachment'),
            'order' => Yii::t('app', 'Order'),
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
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
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
