<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\SurveyOption;
use common\models\SurveyOptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveyOptionController implements the CRUD actions for SurveyOption model.
 */
class SurveyOptionController extends Controller
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
     * Lists all SurveyOption models.
     *
     * @return string
     */
    // public function actionIndex()
    // {
    //     $searchModel = new SurveyOptionSearch();
    //     $dataProvider = $searchModel->search($this->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    /**
     * Displays a single SurveyOption model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new SurveyOption model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new SurveyOption();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing SurveyOption model.
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
     * Updates an existing SurveyOption model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionFindforupdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['survey-question/view', 'id' => $model->question_id]);
        }

        return $this->renderPartial('_formmini', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SurveyOption model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSetOptionWeight($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['survey-question/view', 'id' => $model->question_id]);
        }

        return $this->renderPartial('_weightformmini', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SurveyOption model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdateIsCorrect()
    // {
    //     $request = Yii::$app->request;
    //     $pk = $request->post('id'); // ID del registro
        
    //     // Busca el modelo utilizando la clave primaria ($pk)
    //     $model = $this->findModel($pk); // Cambia `findModel` por el nombre real de tu método para encontrar el modelo.
    
    //     if ($request->isPost && $model->load($request->post())) {
    //         if ($model->save()) {
    //             // Convierte `is_correct` en un valor legible (opcional)
    //             $output = $model->is_correct ? 'Yes' : 'No';
    //             return json_encode(['output' => $output, 'message' => 'Success']);
    //         } else {
    //             // Responder con errores si el guardado falla
    //             return json_encode(['output' => '', 'message' => 'Error al actualizar']);
    //         }
    //     }
    
    //     // Devolver sin cambios si no se guarda
    //     return json_encode(['output' => '', 'message' => 'problems']);
    // }

    /**
     * Updates an existing SurveyOption model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdateManyCorrect()
    // {
    //     $request = Yii::$app->request;
    //     $pk = $request->post('id'); // ID del registro
        
    //     // Busca el modelo utilizando la clave primaria ($pk)
    //     $model = $this->findModel($pk); // Cambia `findModel` por el nombre real de tu método para encontrar el modelo.
    
    //     if ($request->isPost && $model->load($request->post())) {
    //         if ($model->save()) {
    //             // Convierte `is_correct` en un valor legible (opcional)
    //             $output = $model->is_correct ? 'Yes' : 'No';
    //             return json_encode(['output' => $output, 'message' => 'Success']);
    //         } else {
    //             // Responder con errores si el guardado falla
    //             return json_encode(['output' => '', 'message' => 'Error al actualizar']);
    //         }
    //     }
    
    //     // Devolver sin cambios si no se guarda
    //     return json_encode(['output' => '', 'message' => 'problems']);
    // }

    /**
     * Deletes an existing SurveyOption model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try {
            // Intenta eliminar el curso
            $model = SurveyOption::findOne(['id' => $id]);
            if ($model !== null) { // validate if lesson published status to proceed deletion
                $model->delete();
                Yii::$app->session->setFlash('success', 'La opción ha sido eliminada exitosamente.');
                return $this->redirect(['survey-question/view', 'id' => $model->question_id]);
            } else {
                Yii::$app->session->setFlash('error', 'La opción no existe.');
            }
        } catch (\Exception $e) {
            // Si hay un error, muestra un mensaje de alerta
            Yii::$app->session->setFlash('error', 'No se puede eliminar la opción debido a que esta publicada.');
            Yii::error("Error al eliminar la opción: " . $e->getMessage(), __METHOD__); // Guarda el error en el log para depuración
            // Redirige a la página correspondiente después de intentar eliminar
            return $this->redirect(Yii::$app->request->referrer ?: ['survey-question/view', 'id' => $model->question_id]);
        }
        
        // Redirige a la página correspondiente después de intentar eliminar
        return $this->redirect(Yii::$app->request->referrer ?: ['survey-question/view', 'id' => $model->question_id]);
    }

    /**
     * Finds the SurveyOption model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SurveyOption the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SurveyOption::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
