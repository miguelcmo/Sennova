<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $category_id
 * @property int $instructor_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Assignment[] $assignments
 * @property Attendance[] $attendances
 * @property CourseCategory $category
 * @property Certificate[] $certificates
 * @property CourseCompletion[] $courseCompletions
 * @property CourseFeedback[] $courseFeedbacks
 * @property CourseModule[] $courseModules
 * @property CourseRating[] $courseRatings
 * @property DiscussionForum[] $discussionForums
 * @property Enrollment[] $enrollments
 * @property GradeItem[] $gradeItems
 * @property Gradebook[] $gradebooks
 * @property User $instructor
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
            [['title', 'category_id', 'instructor_id', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['category_id', 'instructor_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['instructor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['instructor_id' => 'id']],
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
            'category_id' => Yii::t('app', 'Category ID'),
            'instructor_id' => Yii::t('app', 'Instructor ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|CourseCategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CourseCategory::class, ['id' => 'category_id']);
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
     * Gets query for [[Instructor]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(User::class, ['id' => 'instructor_id']);
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
