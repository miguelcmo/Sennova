<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\SurveySection;
use common\models\SurveySectionSearch;
use common\models\SurveyQuestion;
use common\models\SurveyQuestionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveyQuestionController implements the CRUD actions for SurveyQuestion model.
 */
class SurveyQuestionController extends Controller
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
     * Lists all SurveyQuestion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SurveyQuestionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SurveyQuestion model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SurveyQuestion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($surveySectionId = null)
    {
        $model = new SurveyQuestion();
        $surveySectionModel = SurveySection::findOne($surveySectionId);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->survey_id = $surveySectionModel->survey_id;
                $model->section_id = $surveySectionModel->id;
                if ($model->save()) {
                    return $this->redirect(['survey-section/view', 'id' => $surveySectionId]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'surveySectionModel' => $surveySectionModel,
        ]);
    }

    /**
     * Updates an existing SurveyQuestion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SurveyQuestion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try {
            // Intenta eliminar el curso
            $model = SurveyQuestion::findOne(['id' => $id]);
            if ($model !== null) { // validate if lesson published status to proceed deletion
                $model->delete();
                Yii::$app->session->setFlash('success', 'La pregunta ha sido eliminada exitosamente.');
                return $this->redirect(['survey-section/view', 'id' => $model->section_id]);
            } else {
                Yii::$app->session->setFlash('error', 'La pregunta no existe.');
            }
        } catch (\Exception $e) {
            // Si hay un error, muestra un mensaje de alerta
            Yii::$app->session->setFlash('error', 'No se puede eliminar la pregunta debido a que esta publicada.');
            Yii::error("Error al eliminar la pregunta: " . $e->getMessage(), __METHOD__); // Guarda el error en el log para depuración
            // Redirige a la página correspondiente después de intentar eliminar
            return $this->redirect(Yii::$app->request->referrer ?: ['survey-section/view', 'id' => $model->section_id]);
        }
        
        // Redirige a la página correspondiente después de intentar eliminar
        return $this->redirect(Yii::$app->request->referrer ?: ['survey-section/view', 'id' => $model->section_id]);
    }

    /**
     * Finds the SurveyQuestion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SurveyQuestion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SurveyQuestion::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
