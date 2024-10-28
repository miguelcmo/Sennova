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
        $userProfile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        $userProfileInfo = ProfileInfo::find()->where(['profile_id' => $userProfile->id])->one();
        $enrollments = Enrollment::find()->where(['user_id' => Yii::$app->user->id, 'status' => 10])->all();

        return $this->render('index', [
            'userProfile' => $userProfile,
            'userProfileInfo' => $userProfileInfo,
            'enrollments' => $enrollments,
        ]);
    }

}
