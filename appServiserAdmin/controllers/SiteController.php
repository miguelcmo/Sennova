<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\LoginForm;
use common\models\Course;
use common\models\Lesson;
use common\models\User;
use common\models\AuthAssignment;
use common\models\Profile;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        $courses = Course::find()->count();
        $lessons = Lesson::find()->count();

        // $auth = Yii::$app->authManager;
        // $roleName = 'subscriber';
        // $usersWithRole = [];
        // foreach ($auth->getUserIdsbyRole($roleName) as $userId) {
        //     $user = User::findOne($userId);
        //     if ($user !== null) {
        //         $usersWithRole[] = $user;
        //     }
        // }
        $subscribers = AuthAssignment::find()->where(['item_name' => 'subscriber'])->count();

        $profile = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        if (!$profile) {
            Yii::$app->session->setFlash(
                'warning', 
                Yii::t('app', "You haven't completed your profile yet. Please complete your profile here!") . ' ' . 
                Html::a(Yii::t('app', 'Profile Update'), ['profile/view', 'id' => Yii::$app->user->id], ['class' => 'btn btn-warning'])
            );
        } else if ($profile && ($profile->full_name === null || trim($profile->full_name) === '')) {
            Yii::$app->session->setFlash(
                'warning', 
                Yii::t('app', "You haven't completed your profile yet. Please complete your profile here!") . ' ' . 
                Html::a(Yii::t('app', 'Profile Update'), ['profile/view', 'id' => Yii::$app->user->id], ['class' => 'btn btn-warning'])
            );
        }

        return $this->render('index', [
            'courses' => $courses,
            'lessons' => $lessons,
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        // Layout does not apply
        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->adminlogin()) {
            Yii::$app->activityLogger->log('login', 'Usuario inició sesión');
            return $this->goBack();
        } else {
            Yii::$app->activityLogger->log('login', 'Usuario intenta iniciar sesión en AdminServiser, permiso denegado.');
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
