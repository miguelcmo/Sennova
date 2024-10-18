<?php

namespace appServiser\controllers;

use common\models\Lesson;
use common\models\LessonSearch;

class TestController extends \yii\web\Controller
{
    public function actionCourse($id = null)
    {
        $model = $this->findModel(2);

        return $this->render('course', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Finds the CourseModule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Lesson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lesson::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
