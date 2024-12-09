<?php

namespace appServiser\controllers;

use Yii;
use common\models\Course;
use common\models\CourseSearch;
use common\models\CourseModule;
use common\models\CourseModuleSearch;
use common\models\CourseLesson;
use common\models\CourseLessonSearch;
use common\models\Enrollment;
use common\models\EnrollmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for Course model and its dependants models.
 */
class CourseController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['*'],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User Profile model and User ProfileInfo model.
     *
     * @return string
     */
    public function actionView($id)
    {
        $course = Course::find()->where(['id' => $id])->one();
        if ($course != null) {
            $courseModules = CourseModule::find()->where(['course_id' => $id])->all();
            $lessons = CourseLesson::find()->where(['course_id' => $id])->all();
        } else {
            $courseModules = [];
            $lessons = [];
        }

        $enrollment = Enrollment::find()->where(['course_id' => $course->id, 'user_id' => Yii::$app->user->id, 'status' => 10])->one();

        return $this->render('view', [
            'course' => $course,
            'courseModules' => $courseModules,
            'lessons' => $lessons,
            'enrollment' => $enrollment,
        ]);
    }

}
