<?php

namespace appServiser\controllers;

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
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for Course model and its dependants models.
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
            return $this->redirect(['member/index']);
        }

        return $this->render('view', [
            'model' => $model,
            'attributes' => $attributes,
            'survey' => $survey,
            'sections' => $sections,
            'questions' => $questions,
            'options' => $options,
        ]);
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
