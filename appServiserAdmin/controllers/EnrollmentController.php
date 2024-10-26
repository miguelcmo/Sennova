<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\Course;
use common\models\Enrollment;
use common\models\EnrollmentSearch;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * EnrollmentController implements the CRUD actions for Enrollment model.
 */
class EnrollmentController extends \yii\web\Controller
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
     * Lists all Enrollment models. 
     * 
     * @return string 
     */ 
    public function actionIndex()
    {
        $searchModel = new EnrollmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        // Optionally set the default order here, if needed
        $dataProvider->sort->defaultOrder = ['enrolled_at' => SORT_DESC]; // or SORT_ASC
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enrollment model.
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

    public function actionEnroll()
    {
        $model = new Enrollment();

        $usersList = User::find()
            ->select(["CONCAT(username, '(', email, ')') AS usernameEmail"])
            ->where(['!=', 'id', 1])
            ->indexBy('id')
            ->orderBy('id')
            ->column();

        // $usersList = User::find()
        //     ->select(["id", "CONCAT(username, '(', email, ')') AS usernameEmail"])
        //     ->where(['!=', 'id', 1])
        //     ->orderBy('id')
        //     ->asArray()
        //     ->all();
        
        // $usersList = ArrayHelper::map($usersList, 'id', 'usernameEmail');

        $coursesList = Course::find()
            ->select('title')
            ->indexBy('id')
            ->column();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->enrolled_at = date('Y-m-d H:i:s');
                $model->status = 10;
                $searchModel = Enrollment::find()->where(['course_id' => $model->course_id, 'user_id' => $model->user_id])->one();
                if (!$searchModel && $model->save()) { // if not exists... save the enrollment
                    return $this->redirect(['index']);
                } else if ($searchModel && $searchModel->status == 9) {
                    $searchModel->enrolled_at = date('Y-m-d H:i:s');
                    $searchModel->dropped_at = null;
                    $searchModel->status = 10;
                    $searchModel->save();
                    return $this->redirect(['index']); // if exists but status = innactive, delete dropped_at and change status in other words re-active the enrollment
                } else if ($searchModel && $searchModel->status == 10) {
                    Yii::$app->session->setFlash('error', Yii::t('app', 'The user is currently enrolled to this module.'));
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('enroll', [
            'model' => $model,
            'usersList' => $usersList,
            'coursesList' => $coursesList,
        ]);
    }

    public function actionUnenroll()
    {
        $model = new Enrollment();

        $usersList = User::find()
            ->select(["CONCAT(username, '(', email, ')') AS usernameEmail"])
            ->where(['!=', 'id', 1])
            ->indexBy('id')
            ->orderBy('id')
            ->column();

        $coursesList = Course::find()
            ->select('title')
            ->indexBy('id')
            ->column();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $searchModel = Enrollment::find()->where(['course_id' => $model->course_id, 'user_id' => $model->user_id])->one();
                if (!$searchModel) {
                    Yii::$app->session->setFlash('error', Yii::t('app', 'There is nothing to do here. The enrollment you want to delete does not exist.'));
                } else if ($searchModel) {
                    $searchModel->delete();
                    Yii::$app->session->setFlash('success', 'The enrollment has been successfully deleted.');
                    return $this->redirect(['index']);
                    // Yii::$app->session->setFlash('confirmDelete', [
                    //     'title' => Yii::t('app', 'Confirm Delete'),
                    //     'message' => Yii::t('app', 'Are you sure you want to delete this enrollment? This action cannot be undone.'),
                    //     'modelId' => $searchModel->id,
                    // ]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('unenroll', [
            'model' => $model,
            'usersList' => $usersList,
            'coursesList' => $coursesList,
        ]);
    }
    
    /**
     * Deletes an existing Enrollment model.
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
     * Finds the Enrollment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Enrollment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Enrollment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
