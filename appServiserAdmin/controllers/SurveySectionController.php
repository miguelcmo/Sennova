<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\SurveySection;
use common\models\SurveySectionSearch;
use common\models\SurveyQuestion;
use common\models\SurveyQuestionSearch;
use common\models\SurveyOption;
use common\models\SurveyOptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveySectionController implements the CRUD actions for SurveySection model.
 */
class SurveySectionController extends Controller
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
     * Lists all SurveySection models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SurveySectionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SurveySection model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new SurveyQuestionSearch(['section_id' => $id]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        $surveyQuestionModel = new SurveyQuestion();

        if ($this->request->isPost) {
            $formName = $this->request->post('form-name');

            if ($formName === 'surveySectionUpdate') {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $id]);
                }
            } elseif ($formName === 'surveyQuestionCreate') {
                if ($surveyQuestionModel->load($this->request->post())) {
                    $surveyQuestionModel->survey_id = $model->survey_id;
                    $surveyQuestionModel->section_id = $model->id;
                    if ($surveyQuestionModel->save()) {
                        if ($surveyQuestionModel->question_type == 'true_false') {
                            $optionTrue = new SurveyOption();
                            $optionTrue->question_id = $surveyQuestionModel->id;
                            $optionTrue->option_text = 'True';
                            $optionTrue->is_correct = 1;
                            $optionTrue->weight = 100;
    
                            $optionFalse = new SurveyOption();
                            $optionFalse->question_id = $surveyQuestionModel->id;
                            $optionFalse->option_text = 'False';
                            $optionFalse->is_correct = 0;
                            $optionFalse->weight = 0;
                            
                            if ($optionTrue->save() && $optionFalse->save()) {
                                $qType = $surveyQuestionModel->question_type; 
                                if ($qType == 'multiple_choice' || $qType == 'checkbox' || $qType == 'drop_down_list' || $qType == 'true_false') {
                                    return $this->redirect(['survey-question/view', 'id' => $surveyQuestionModel->id]);
                                } else {
                                    return $this->redirect(['view', 'id' => $id]);
                                }
                            }
                        }
                        $qType = $surveyQuestionModel->question_type; 
                        if ($qType == 'multiple_choice' || $qType == 'checkbox' || $qType == 'drop_down_list' || $qType == 'true_false') {
                            return $this->redirect(['survey-question/view', 'id' => $surveyQuestionModel->id]);
                        } else {
                            return $this->redirect(['view', 'id' => $id]);
                        }
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'surveyQuestionModel' => $surveyQuestionModel,
        ]);
    }

    /**
     * Creates a new SurveySection model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SurveySection();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SurveySection model.
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
     * Updates an existing SurveySection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionFindforupdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['survey/view', 'id' => $model->survey_id]);
        }

        return $this->renderPartial('_formmini', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SurveySection model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try {
            // Intenta eliminar el curso
            $model = SurveySection::findOne(['id' => $id]);
            if ($model !== null) { // validate if lesson published status to proceed deletion
                $model->delete();
                Yii::$app->session->setFlash('success', 'La sección ha sido eliminada exitosamente.');
                return $this->redirect(['survey/view', 'id' => $model->survey_id]);
            } else {
                Yii::$app->session->setFlash('error', 'La sección no existe.');
            }
        } catch (\Exception $e) {
            // Si hay un error, muestra un mensaje de alerta
            Yii::$app->session->setFlash('error', 'No se puede eliminar la sección debido a que hay contenido asociado a ésta.');
            Yii::error("Error al eliminar la sección: " . $e->getMessage(), __METHOD__); // Guarda el error en el log para depuración
            // Redirige a la página correspondiente después de intentar eliminar
            return $this->redirect(Yii::$app->request->referrer ?: ['survey/view', 'id' => $model->survey_id]);
        }
        
        // Redirige a la página correspondiente después de intentar eliminar
        return $this->redirect(Yii::$app->request->referrer ?: ['survey/view', 'id' => $model->survey_id]);
    }

    /**
     * Finds the SurveySection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SurveySection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SurveySection::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
