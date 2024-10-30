<?php

namespace appServiser\controllers;

use Yii;
use common\models\Course;
use common\models\CourseSearch;
use common\models\CourseModule;
use common\models\CourseModuleSearch;
use common\models\Lesson;
use common\models\LessonSearch;
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
        $courseModules = CourseModule::find()->where(['course_id' => $id])->all();
        $lessons = Lesson::find()->where(['course_id' => $id])->all();

        return $this->render('view', [
            'course' => $course,
            'courseModules' => $courseModules,
            'lessons' => $lessons,
        ]);
    }

}
