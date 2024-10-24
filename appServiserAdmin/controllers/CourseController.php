<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\Course;
use common\models\CourseSearch;
use common\models\CourseModule;
use common\models\CourseModuleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CourseController implements the CRUD actions for Course model.
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
     * Lists all Course models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $courseModel = new Course();

        if ($this->request->isPost) {
            if ($courseModel->load($this->request->post()) && $courseModel->save()) {
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'courseModel' => $courseModel,
                ]);
            }
        } else {
            $courseModel->loadDefaultValues();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'courseModel' => $courseModel,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $courseModuleModel = new CourseModule();
        $searchModel = new CourseModuleSearch(['course_id' => $id]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            $formName = $this->request->post('form-name');

            if ($formName === 'courseUpdate') {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->render('view', [
                        'model' => $model,
                        'courseModuleModel' => $courseModuleModel,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                }
            } elseif ($formName === 'courseModuleCreate') {
                if ($courseModuleModel->load($this->request->post())) {
                    $courseModuleModel->course_id = $id;
                    if ($courseModuleModel->save()) {
                        return $this->render('view', [
                            'model' => $model,
                            'courseModuleModel' => $courseModuleModel,
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]);
                    }
                }
            }

        } else {
            $courseModuleModel->loadDefaultValues();
        }

        return $this->render('view', [
            'model' => $model,
            'courseModuleModel' => $courseModuleModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Course();

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
     * Updates an existing Course model.
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
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionFindforupdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['course/index']);
        }

        return $this->renderPartial('_formmini', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try {
            // Intenta eliminar el curso
            $course = Course::findOne($id); // Reemplaza con la lógica que uses para encontrar el curso
            if ($course !== null) {
                $course->delete();
                Yii::$app->session->setFlash('success', 'El módulo ha sido eliminado exitosamente.');
                // Redirige a la página correspondiente después de intentar eliminar
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'El módulo no existe.');
            }
        } catch (\Exception $e) {
            // Si hay un error, muestra un mensaje de alerta
            Yii::$app->session->setFlash('error', 'No se puede eliminar el módulo debido a que hay elementos asociados a él.');
            Yii::error("Error al eliminar el módulo: " . $e->getMessage(), __METHOD__); // Guarda el error en el log para depuración
            // Redirige a la página correspondiente después de intentar eliminar
            return $this->redirect(Yii::$app->request->referrer ?: ['index']);
        }
        
        // Redirige a la página correspondiente después de intentar eliminar
        return $this->redirect(Yii::$app->request->referrer ?: ['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
