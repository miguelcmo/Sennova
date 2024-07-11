<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assignment".
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string|null $description
 * @property int $due_date
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AssignmentSubmission[] $assignmentSubmissions
 * @property Course $course
 */
class Assignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'title', 'due_date', 'created_at', 'updated_at'], 'required'],
            [['course_id', 'due_date', 'status', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
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
            'due_date' => Yii::t('app', 'Due Date'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[AssignmentSubmissions]].
     *
     * @return \yii\db\ActiveQuery|AssignmentSubmissionQuery
     */
    public function getAssignmentSubmissions()
    {
        return $this->hasMany(AssignmentSubmission::class, ['assignment_id' => 'id']);
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
     * {@inheritdoc}
     * @return AssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssignmentQuery(get_called_class());
    }
}
