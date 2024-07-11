<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string|null $type
 * @property int|null $size
 * @property int $uploaded_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Certificate[] $certificates
 * @property FileReference[] $fileReferences
 * @property User $uploadedBy
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'path', 'uploaded_by', 'created_at', 'updated_at'], 'required'],
            [['size', 'uploaded_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path', 'type'], 'string', 'max' => 255],
            [['uploaded_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['uploaded_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'path' => Yii::t('app', 'Path'),
            'type' => Yii::t('app', 'Type'),
            'size' => Yii::t('app', 'Size'),
            'uploaded_by' => Yii::t('app', 'Uploaded By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Certificates]].
     *
     * @return \yii\db\ActiveQuery|CertificateQuery
     */
    public function getCertificates()
    {
        return $this->hasMany(Certificate::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[FileReferences]].
     *
     * @return \yii\db\ActiveQuery|FileReferenceQuery
     */
    public function getFileReferences()
    {
        return $this->hasMany(FileReference::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[UploadedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUploadedBy()
    {
        return $this->hasOne(User::class, ['id' => 'uploaded_by']);
    }

    /**
     * {@inheritdoc}
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }
}
