<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\User;
use common\models\Profile;
use common\models\ProfileSearch;
//use common\models\ImageUploadForm;
//use common\models\ChangePasswordForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Profile::find()->where(['user_id' => $id])->one();
        $changePassword = New ChangePasswordForm();
        $imgUpload = new ImageUploadForm();

        if (Yii::$app->request->isPost) {
            if (isset($_POST['ImageUploadForm'])) {
                $imgUpload->imageFile = UploadedFile::getInstance($imgUpload, 'imageFile');
                if ($imgUpload->upload()) {
                    // file is uploaded successfully
                    $model->image = 'img/profile/' . $imgUpload->imageFile->baseName . '.' . $imgUpload->imageFile->extension;
                    if ($model->save()) {
                        return $this->redirect(['view', 'userId' => $model->userId]);
                    }
                }
            } else if (isset($_POST['ChangePasswordForm'])) {
                $changePassword->load($this->request->post());
                $user = User::findOne($userId);
                if (Yii::$app->security->validatePassword($changePassword->actualPassword, $user->password_hash)) {
                    $user->password_hash = Yii::$app->security->generatePasswordHash($changePassword->newPassword);
                    if ($user->save()) {
                        Yii::$app->session->setFlash('changePasswordSuccess', Yii::t('app', 'Your password has been updated successfully!'));
                        return $this->redirect(['view', 'userId' => $userId]);
                    }
                }
            } else if (isset($_POST['Profile'])) {
                $model->load($this->request->post());
                if ($model->save()) {
                    return $this->redirect(['view', 'userId' => $userId]);
                }
            }
            //$csrf = Yii::$app->request->post('_csrf-pms');
            //$form = Yii::$app->request->post('imgUpload');
            //$post = $request->post();
            //return $this->redirect(['test/index', 'variable' => $form]);
        }

        return $this->render('view', [
            'changePassword' => $changePassword,
            'model' => $model,
            'imgUpload' => $imgUpload,
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($userId)
    {
        $profileModel = new Profile();
        $user = User::findOne($userId);

        if ($this->request->isPost) {
            if ($profileModel->load($this->request->post())) {
                $profileModel->userId = $userId;
                $profileModel->fullName = ucwords(strtolower($profileModel->firstName) . ' ' . strtolower($profileModel->lastName));
                $profileModel->image = 'img/profile/generic-user.png';
                $profileModel->status = $user->status;
                if ($model->save()) {
                    return $this->redirect(['user/index']);
                }
            }
        } else {
            $profileModel->loadDefaultValues();
        }

        return $this->render('create', [
            'profileModel' => $profileModel,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($profileId)
    {
        $model = $this->findModel($profileId);
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->fullName = ucwords(strtolower($model->firstName) . ' ' . strtolower($model->lastName));
                $model->image = 'img/profile/generic-user.png';
                $model->status = 10; // system activation

                if ($model->role == 2) {
                    $this->sendNotificationEMail(User::find()->where(['id' => $model->userId])->one());
                }

                $visitor = Visitor::find()->where(['visitorGovId' => $model->govId])->one();
                if (!$visitor) { // not exists
                    $visitor = new Visitor();
                    $visitor->visitorFirstname = $model->firstName;
                    $visitor->visitorLastname = $model->lastName;
                    $visitor->visitorFullname = $model->fullName;
                    $visitor->visitorGovTypeId = $model->govTypeId;
                    $visitor->visitorGovId = $model->govId;
                    $visitor->visitorGender = $model->gender;
                    $visitor->visitorTelephone = $model->telephone;
                    $visitor->visitorEmail = $model->email;
                    $visitor->systemUpdate = 1;
                } else { // exists
                    $visitor->visitorFirstname = $model->firstName;
                    $visitor->visitorLastname = $model->lastName;
                    $visitor->visitorFullname = $model->fullName;
                    $visitor->visitorGovTypeId = $model->govTypeId;
                    $visitor->visitorGender = $model->gender;
                    $visitor->visitorTelephone = $model->telephone;
                    $visitor->visitorEmail = $model->email;
                    $visitor->systemUpdate = 1;
                }
                //$visitor->save();
                if ($model->save() && $visitor->save()) {
                    return $this->redirect(['user/index']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdateAboutMe($profileId)
    {
        $model = $this->findModel($profileId);
        
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'userId' => $model->userId]);
        }

        return $this->render('update-about-me', [
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
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($profileId)
    {
        if (($model = Profile::findOne(['profileId' => $profileId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Sends notofication email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendNotificationEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($user->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
