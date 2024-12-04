<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\Survey;
use common\models\SurveySearch;
use common\models\SurveySection;
use common\models\SurveySectionSearch;
use common\models\SurveyQuestion;
use common\models\SurveyQuestionSearch;
use common\models\SurveyOption;
use common\models\SurveyOptionSearch;
use common\models\SurveyResponse;
use common\models\SurveyResponseSearch;
use common\models\SurveyResponseAnswer;
use common\models\SurveyResponseAnswerSearch;
use common\models\SurveyResponseSelectedOptions;
use common\models\SurveyResponseSelectedOptionsSearch;
use yii\base\DynamicModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveyController implements the CRUD actions for Survey model.
 */
class SurveyController extends Controller
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
     * Lists all Survey models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SurveySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new Survey();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Lists all Survey models.
     * 
     * @return string
     */
    public function actionList()
    {
        $searchModel = new SurveySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Survey model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $surveySectionModel = new SurveySection();

        $searchModel = new SurveySectionSearch(['survey_id' => $id]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            $formName = $this->request->post('form-name');

            if ($formName === 'surveyUpdate') {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $id]);
                }
            } elseif ($formName === 'surveySectionCreate') {
                if ($surveySectionModel->load($this->request->post())) {
                    $surveySectionModel->survey_id = $id;
                    if ($surveySectionModel->save()) {
                        return $this->redirect(['view', 'id' => $id]);
                    }
                }
            }
        } else {
            $surveySectionModel->loadDefaultValues();
        }

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'surveySectionModel' => $surveySectionModel,
        ]);
    }

    /**
     * Displays a single Survey model to render a preview.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPreview($id)
    {
        $survey = $this->findModel($id);
        $sections = SurveySection::find()->where(['survey_id' => $id])->all();
        $questions = SurveyQuestion::find()->where(['survey_id' => $id])->all();
        $options = SurveyOption::find()->where(['survey_id' => $id])->all();

        // Create dynamic attribute names based on the question count
        $attributes = [];
        foreach ($questions as $question) {
            $attributes[$question->id] = "custom" . $question->id; // Updated naming scheme
        }

        // Create a DynamicModel with those attributes
        $model = new DynamicModel(array_keys($attributes));

        // Add validation rules (e.g., all fields required)
        $model->addRule(array_keys($attributes), 'required');

        // Optionally, add specific validation rules for certain attributes
        //$model->addRule(['custom2'], 'email'); // Example: Email validation for one field

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            // Guardar la respuesta principal
            $response = new SurveyResponse();
            $response->survey_id = $survey->id;
            $response->user_id = Yii::$app->user->id;
            $response->total_score = 0; // Puedes calcular el puntaje si es necesario
            $response->status = 'completed'; // O cualquier otro estado que quieras asignar
            $response->save();
    
            // Guardar respuestas a las preguntas
            foreach ($questions as $question) {
                $attributeName = $question->id;
                if (isset($model->$attributeName)) {
                    $responseAnswer = new SurveyResponseAnswer();
                    $responseAnswer->response_id = $response->id;
                    $responseAnswer->question_id = $question->id;
    
                    // Si la respuesta es de tipo texto
                    if (is_array($model->$attributeName)) {
                        $responseAnswer->answer_text = implode(',', $model->$attributeName); // Para respuestas con múltiples opciones
                    } else {
                        $responseAnswer->answer_text = $model->$attributeName;
                    }
                    $responseAnswer->save();
    
                    // Si la pregunta tiene opciones (ej. multiple choice o checkbox)
                    if (is_array($model->$attributeName)) {
                        foreach ($model->$attributeName as $optionId) {
                            $selectedOption = new SurveyResponseSelectedOptions();
                            $selectedOption->response_answer_id = $responseAnswer->id;
                            $selectedOption->option_id = $optionId;
                            $selectedOption->save();
                        }
                    }
                }
            }
    
            Yii::$app->session->setFlash('success', 'Respuestas guardadas correctamente.');
            return $this->redirect(['list']);
        }

        return $this->render('preview', [
            'model' => $model,
            'attributes' => $attributes,
            'survey' => $survey,
            'sections' => $sections,
            'questions' => $questions,
            'options' => $options,
        ]);
    }

    /**
     * Creates a new Survey model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Survey();

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
     * Updates an existing Survey model.
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
     * Updates an existing Survey model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionFindforupdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['survey/index']);
        }

        return $this->renderPartial('_formmini', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Survey model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try {
            // Try to delete the survey
            $survey = Survey::findOne($id); // Reemplaza con la lógica que uses para encontrar el curso
            if ($survey !== null) {
                $survey->delete();
                Yii::$app->session->setFlash('success', 'La encuesta ha sido eliminada exitosamente.');
                // Redirige a la página correspondiente después de intentar eliminar
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'La encuesta no existe.');
            }
        } catch (\Exception $e) {
            // Si hay un error, muestra un mensaje de alerta
            Yii::$app->session->setFlash('error', 'No se puede eliminar la encuesta debido a que hay elementos asociados a ella.');
            Yii::error("Error al eliminar la encuesta: " . $e->getMessage(), __METHOD__); // Guarda el error en el log para depuración
            // Redirige a la página correspondiente después de intentar eliminar
            return $this->redirect(Yii::$app->request->referrer ?: ['index']);
        }
        
        // Redirige a la página correspondiente después de intentar eliminar
        return $this->redirect(Yii::$app->request->referrer ?: ['index']);
    }

    /**
     * Finds the Survey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Survey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Survey::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
