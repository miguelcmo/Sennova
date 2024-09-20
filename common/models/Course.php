<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Assignment[] $assignments
 * @property Attendance[] $attendances
 * @property Certificate[] $certificates
 * @property CourseCompletion[] $courseCompletions
 * @property CourseFeedback[] $courseFeedbacks
 * @property CourseModule[] $courseModules
 * @property CourseRating[] $courseRatings
 * @property DiscussionForum[] $discussionForums
 * @property Enrollment[] $enrollments
 * @property GradeItem[] $gradeItems
 * @property Gradebook[] $gradebooks
 * @property Quiz[] $quizzes
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
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
     * Gets query for [[Assignments]].
     *
     * @return \yii\db\ActiveQuery|AssignmentQuery
     */
    public function getAssignments()
    {
        return $this->hasMany(Assignment::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Attendances]].
     *
     * @return \yii\db\ActiveQuery|AttendanceQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Certificates]].
     *
     * @return \yii\db\ActiveQuery|CertificateQuery
     */
    public function getCertificates()
    {
        return $this->hasMany(Certificate::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[CourseCompletions]].
     *
     * @return \yii\db\ActiveQuery|CourseCompletionQuery
     */
    public function getCourseCompletions()
    {
        return $this->hasMany(CourseCompletion::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[CourseFeedbacks]].
     *
     * @return \yii\db\ActiveQuery|CourseFeedbackQuery
     */
    public function getCourseFeedbacks()
    {
        return $this->hasMany(CourseFeedback::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[CourseModules]].
     *
     * @return \yii\db\ActiveQuery|CourseModuleQuery
     */
    public function getCourseModules()
    {
        return $this->hasMany(CourseModule::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[CourseRatings]].
     *
     * @return \yii\db\ActiveQuery|CourseRatingQuery
     */
    public function getCourseRatings()
    {
        return $this->hasMany(CourseRating::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[DiscussionForums]].
     *
     * @return \yii\db\ActiveQuery|DiscussionForumQuery
     */
    public function getDiscussionForums()
    {
        return $this->hasMany(DiscussionForum::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery|EnrollmentQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollment::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[GradeItems]].
     *
     * @return \yii\db\ActiveQuery|GradeItemQuery
     */
    public function getGradeItems()
    {
        return $this->hasMany(GradeItem::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Gradebooks]].
     *
     * @return \yii\db\ActiveQuery|GradebookQuery
     */
    public function getGradebooks()
    {
        return $this->hasMany(Gradebook::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Quizzes]].
     *
     * @return \yii\db\ActiveQuery|QuizQuery
     */
    public function getQuizzes()
    {
        return $this->hasMany(Quiz::class, ['course_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseQuery(get_called_class());
    }
}
