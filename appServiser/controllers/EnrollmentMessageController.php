<?php

namespace appServiser\controllers;

use Yii;
use common\models\Enrollment;
use common\models\EnrollmentSearch;
use common\models\EnrollmentMessage;
use common\models\EnrollmentMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnrollmentMessageController implements the CRUD actions for EnrollmentMessage model.
 */
class EnrollmentMessageController extends Controller
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
     * Lists all EnrollmentMessage models.
     *
     * @return string
     */
    public function actionIndex($enrollmentId)
    {
        // $searchModel = new EnrollmentMessageSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);

        $enrollment = Enrollment::find()->where(['id' => $enrollmentId])->one();
        $messageModel = new EnrollmentMessage();
        $messages = EnrollmentMessage::find()->where(['enrollment_id' => $enrollmentId])->orderBy(['created_at' => SORT_DESC])->all();

        if ($this->request->isPost) {
            if ($messageModel->load($this->request->post())) {
                $messageModel->enrollment_id = $enrollmentId;
                $messageModel->sender_id = Yii::$app->user->id;
                if ($messageModel->save()) { 
                    return $this->redirect(['index', 'enrollmentId' => $enrollmentId]);
                }
            }
        } else {
            $messageModel->loadDefaultValues();
        }

        return $this->render('index', [
            'enrollment' => $enrollment,
            'messageModel' => $messageModel,
            'messages' => $messages,
        ]);
    }

    /**
     * Displays a single EnrollmentMessage model.
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
     * Creates a new EnrollmentMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new EnrollmentMessage();

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
     * Updates an existing EnrollmentMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Deletes an existing EnrollmentMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the EnrollmentMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return EnrollmentMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnrollmentMessage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
