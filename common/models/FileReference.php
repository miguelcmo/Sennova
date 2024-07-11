<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file_reference".
 *
 * @property int $id
 * @property int $file_id
 * @property string $model
 * @property int $model_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property File $file
 */
class FileReference extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_reference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'model', 'model_id', 'created_at', 'updated_at'], 'required'],
            [['file_id', 'model_id', 'created_at', 'updated_at'], 'integer'],
            [['model'], 'string', 'max' => 255],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file_id' => Yii::t('app', 'File ID'),
            'model' => Yii::t('app', 'Model'),
            'model_id' => Yii::t('app', 'Model ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery|FileQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::class, ['id' => 'file_id']);
    }

    /**
     * {@inheritdoc}
     * @return FileReferenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileReferenceQuery(get_called_class());
    }
}
