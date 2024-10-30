<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\Mentorship;
use common\models\MentorshipSearch;
use common\models\EnrollmentMessage;
use common\models\EnrollmentMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MentorshipController implements the CRUD actions for Mentorship model.
 */
class MentorshipController extends Controller
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
     * Lists all Mentorship models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MentorshipSearch(['user_id' => Yii::$app->user->id]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mentorship model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $messageModel = new EnrollmentMessage();
        $messages = EnrollmentMessage::find()->where(['enrollment_id' => $model->enrollment_id])->orderBy(['created_at' => SORT_DESC])->all();

        if ($this->request->isPost) {
            if ($messageModel->load($this->request->post())) {
                $messageModel->enrollment_id = $model->enrollment_id;
                $messageModel->sender_id = Yii::$app->user->id;
                if ($messageModel->save()) { 
                    return $this->redirect(['view', 'id' => $id]);
                }
            }
        } else {
            $messageModel->loadDefaultValues();
        }

        return $this->render('view', [
            'model' => $model,
            'messageModel' => $messageModel,
            'messages' => $messages,
        ]);
    }

    /**
     * Creates a new Mentorship model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new Mentorship();

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
     * Updates an existing Mentorship model.
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
     * Deletes an existing Mentorship model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->delete()) {
    //         return $this->redirect(['enrollment/view', 'id' => $model->enrollment_id]);
    //     }
    // }

    /**
     * Finds the Mentorship model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Mentorship the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mentorship::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
