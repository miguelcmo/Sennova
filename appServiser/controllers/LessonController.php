<?php

namespace appServiser\controllers;

use Yii;
use common\models\Lesson;
use common\models\LessonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for Course model and its dependants models.
 */
class LessonController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
        $lesson = Lesson::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'lesson' => $lesson,
        ]);
    }

}
