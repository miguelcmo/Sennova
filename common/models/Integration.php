<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "integration".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $api_key
 * @property string|null $api_secret
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Integration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'api_key', 'api_secret'], 'string', 'max' => 255],
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
            'description' => Yii::t('app', 'Description'),
            'api_key' => Yii::t('app', 'Api Key'),
            'api_secret' => Yii::t('app', 'Api Secret'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return IntegrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IntegrationQuery(get_called_class());
    }
}
