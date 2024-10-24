<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\CourseModule;
use common\models\CourseModuleSearch;
use common\models\Lesson;
use common\models\LessonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CourseModuleController implements the CRUD actions for CourseModule model.
 */
class CourseModuleController extends Controller
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
     * Lists all CourseModule models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CourseModuleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CourseModule model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id); // se busca a si mismo para actualizar la instancia
        $searchModel = new LessonSearch(['course_module_id' => $id]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            $formName = $this->request->post('form-name');

            if ($formName === 'courseModuleUpdate') {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->render('view', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                }
            } 
        }

        return $this->render('view', [
            //'model' => $this->findModel($id),
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new CourseModule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CourseModule();

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
     * Updates an existing CourseModule model.
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
     * Updates an existing CourseModule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionFindforupdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['course/view', 'id' => $model->course_id]);
        }

        return $this->renderPartial('_formmini', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CourseModule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $model = $this->findModel($id);
        // $model->delete();
        // return $this->redirect(['course/view', 'id' => $model->course_id]);
        try {
            // Intenta eliminar el curso
            $courseModule = CourseModule::findOne($id);
            if ($courseModule !== null) {
                $courseModule->delete();
                Yii::$app->session->setFlash('success', 'La sección ha sido eliminada exitosamente.');
                return $this->redirect(['course/view', 'id' => $courseModule->course_id]);
            } else {
                Yii::$app->session->setFlash('error', 'La sección no existe.');
            }
        } catch (\Exception $e) {
            // Si hay un error, muestra un mensaje de alerta
            Yii::$app->session->setFlash('error', 'No se puede eliminar la sección debido a que hay contenido asociado a ésta.');
            Yii::error("Error al eliminar la sección: " . $e->getMessage(), __METHOD__); // Guarda el error en el log para depuración
            // Redirige a la página correspondiente después de intentar eliminar
            return $this->redirect(Yii::$app->request->referrer ?: ['course/view', 'id' => $courseModule->course_id]);
        }
        
        // Redirige a la página correspondiente después de intentar eliminar
        return $this->redirect(Yii::$app->request->referrer ?: ['course/view', 'id' => $courseModule->course_id]);
    }

    /**
     * Finds the CourseModule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CourseModule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CourseModule::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
