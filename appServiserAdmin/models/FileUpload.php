<?php

namespace appServiserAdmin\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FileUpload extends Model
{
    /**
     * @var UploadedFile Almacena el archivo subido temporalmente.
     */
    public $file;

    /**
     * Reglas de validación para el archivo.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf, docx', 'maxSize' => 1024 * 1024 * 5, 'tooBig' => 'El archivo no puede exceder los 5MB.'], // Agrega extensiones válidas y tamaño máximo de archivo.
        ];
    }

    /**
     * Guarda el archivo en la ubicación especificada.
     * 
     * @param string $path Ruta de destino donde se guardará el archivo.
     * @return bool Retorna true si el archivo se guarda correctamente.
     */
    public function upload($path)
    {
        if ($this->validate()) { // Validar archivo antes de guardar
            $filePath = $path . $this->file->baseName . '.' . $this->file->extension;
            if ($this->file->saveAs($filePath)) {
                // Puedes hacer procesamiento adicional aquí si es necesario
                return true;
            }
        }
        return false;
    }
}
