<?php

namespace appServiser\controllers;

use Yii;
use common\models\Profile;
use common\models\ProfileSearch;
use common\models\ProfileInfo;
use common\models\ProfileInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
     * Lists all Profile models.
     *
     * @return string
     */
    // public function actionIndex()
    // {
    //     $searchModel = new ProfileSearch();
    //     $dataProvider = $searchModel->search($this->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    /**
     * Displays a single Profile model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($userId)
    {
        // Verify if exist a model with the $userId
        $model = $this->verifyProfileExist($userId);

        // If model does not exist, create new models Profile and ProfileInfo and assign the userId of the looged user
        if (!$model) {
            $model = New Profile();
            $model->user_id = Yii::$app->user->id;
            $model->save();

            $piModel = New ProfileInfo();
            $piModel->profile_id = $model->id;
            $piModel->save();
        }

        $bioModel = ProfileInfo::find()->where(['profile_id' => $model->id])->one(); 

        if ($this->request->isPost) {
            $formName = $this->request->post('form-name');

            if ($formName == "profileUpdate") {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['profile/view', 'userId' => $model->user_id]);
                }
            } else if ($formName == "profileInfoUpdate") {
                if ($bioModel->load($this->request->post()) && $bioModel->save()) {
                    return $this->redirect(['profile/view', 'userId' => $model->user_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('view', [
            'model' => $model,
            'bioModel' => $bioModel,
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profile();

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
     * Updates an existing Profile model.
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
     * Deletes an existing Profile model.
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
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Finds the Profile model based on user_id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $userId ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function verifyProfileExist($userId)
    {
        if ($userId == Yii::$app->user->id) {
            if (($model = Profile::findOne(['user_id' => $userId])) !== null) {
                return $model;
            }
            return false;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
