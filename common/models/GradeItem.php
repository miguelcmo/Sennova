<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grade_item".
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string|null $description
 * @property float|null $max_grade
 * @property float|null $weight
 * @property int $grade_type
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Course $course
 * @property Gradebook[] $gradebooks
 * @property Grade[] $grades
 */
class GradeItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grade_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'title', 'created_at', 'updated_at'], 'required'],
            [['course_id', 'grade_type', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['max_grade', 'weight'], 'number'],
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
            'max_grade' => Yii::t('app', 'Max Grade'),
            'weight' => Yii::t('app', 'Weight'),
            'grade_type' => Yii::t('app', 'Grade Type'),
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
     * Gets query for [[Gradebooks]].
     *
     * @return \yii\db\ActiveQuery|GradebookQuery
     */
    public function getGradebooks()
    {
        return $this->hasMany(Gradebook::class, ['item_id' => 'id']);
    }

    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery|GradeQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::class, ['grade_item_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return GradeItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GradeItemQuery(get_called_class());
    }
}
