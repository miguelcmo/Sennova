<?php

namespace appServiserAdmin\controllers;

use Yii;
use appServiserAdmin\models\FileUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
//use yii\filters\CsrfFilter;
use yii\filters\VerbFilter;


/**
 * FileController implements the actions for manage files in the server.
 */
class FileController extends Controller
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
                        'uploadWithCkEditor' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Manage the file upload action.
     *
     * @return string
     */
    public function actionUpload()
    {
        $model = new FileUpload();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                $filePath = 'images/uploads/' . $model->file->baseName . '.' . $model->file->extension;
                if ($model->file->saveAs($filePath)) {
                    return $this->redirect(['success']);
                }
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Manage the file upload action for the CKEditor simpleUpload function.
     *
     * @return string
     */
    public function actionUploadWithCkEditor()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Verificar que el archivo fue cargado
        $file = UploadedFile::getInstanceByName('upload');
        if ($file && $file->error == UPLOAD_ERR_OK) {
            // Definir ruta y nombre de archivo
            $uploadDir = Yii::getAlias('@webroot/images/uploads/');
            $fileName = uniqid() . '.' . $file->extension;
            $filePath = $uploadDir . $fileName;

            // Verificar si la carpeta existe; si no, crearla
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Guardar archivo en el servidor
            if ($file->saveAs($filePath)) {
                // Retornar URL pública del archivo
                $fileUrl = Yii::$app->request->hostInfo . Yii::getAlias('@web/images/uploads/') . $fileName;
                return [
                    //'uploaded' => true,
                    'url' => $fileUrl,
                ];
            } else {
                return [
                    //'uploaded' => false,
                    'error' => ['message' => 'No se pudo guardar el archivo.']
                ];
            }
        } else {
            return [
                //'uploaded' => false,
                'error' => ['message' => 'Error al subir el archivo.']
            ];
        }
    }

    /**
     * Action List all files in a specific needed.
     *
     * @return string
     */
    public function actionList()
    {
        $files = "";

        return $this->render('list', [
            'files' => $files,
        ]);
    }

    /**
     * Download action for a specific file.
     *
     * @return string
     */
    public function actionDownload($filename)
    {
        $filePath = 'images/uploads/' . $filename;

        if (file_exists($filePath)) {
            return Yii::$app->response->sendFile($filePath);
        } else {
            throw new \yii\web\NotFoundHttpException("Archivo no encontrado.");
        }
    }
}
