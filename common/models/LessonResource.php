<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lesson_resource".
 *
 * @property int $id
 * @property int $lesson_id
 * @property string $title
 * @property string|null $description
 * @property string $file_path
 * @property string $type
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Lesson $lesson
 */
class LessonResource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_resource';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'title', 'file_path', 'type', 'created_at', 'updated_at'], 'required'],
            [['lesson_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title', 'file_path'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lesson_id' => Yii::t('app', 'Lesson ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'file_path' => Yii::t('app', 'File Path'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery|LessonQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::class, ['id' => 'lesson_id']);
    }

    /**
     * {@inheritdoc}
     * @return LessonResourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LessonResourceQuery(get_called_class());
    }
}
