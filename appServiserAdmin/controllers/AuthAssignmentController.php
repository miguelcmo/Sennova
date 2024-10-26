<?php

namespace appServiserAdmin\controllers;

use Yii;
use common\models\AuthAssignment;
use common\models\AuthAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
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
     * Lists all AuthAssignment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AuthAssignmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name Item Name
     * @param int $user_id User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($item_name, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($item_name, $user_id),
        ]);
    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new AuthAssignment();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name Item Name
     * @param int $user_id User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item_name, $user_id)
    {
        $model = $this->findModel($item_name, $user_id);

        $auth = Yii::$app->authManager;
        $roles = $auth->getRoles();

        // Convertir los roles a un formato de arreglo, excluyendo "superadmin"
        $roleOptions = [];
        foreach ($roles as $role) {
            if ($role->name !== 'superadmin') { // Verifica si el rol no es "superadmin"
                $roleOptions[$role->name] = $role->name; // Usa el nombre y la descripción del rol
            }
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'roleOptions' => $roleOptions,
        ]);
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name Item Name
     * @param int $user_id User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($item_name, $user_id)
    // {
    //     $this->findModel($item_name, $user_id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name Item Name
     * @param int $user_id User ID
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
