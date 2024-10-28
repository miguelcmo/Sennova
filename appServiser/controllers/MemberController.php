<?php

namespace appServiser\controllers;

use Yii;
use common\models\Profile;
use common\models\ProfileSearch;
use common\models\ProfileInfo;
use common\models\ProfileInfoSearch;
use common\models\Enrollment;
use common\models\EnrollmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
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
     * Lists all User Profile model and User ProfileInfo model.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Verify if Profile model exist with the $userId
        $model = $this->verifyProfileExist(Yii::$app->user->id);

        // If model does not exist, create new models Profile and ProfileInfo and assign the userId of the looged user
        if (!$model) {
            $model = New Profile();
            $model->user_id = Yii::$app->user->id;
            $model->save();

            $piModel = New ProfileInfo();
            $piModel->profile_id = $model->id;
            $piModel->save();
        }

        // Find the models Profile, ProfileInfo and Enrollment based on $userId
        $userProfile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        $userProfileInfo = ProfileInfo::find()->where(['profile_id' => $userProfile->id])->one();
        $enrollments = Enrollment::find()->where(['user_id' => Yii::$app->user->id, 'status' => 10])->all();

        return $this->render('index', [
            'userProfile' => $userProfile,
            'userProfileInfo' => $userProfileInfo,
            'enrollments' => $enrollments,
        ]);
    }

    /**
     * Search for the Profile model based on user_id value.
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
