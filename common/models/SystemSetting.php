<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_setting".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $description
 * @property string $type
 * @property int $created_at
 * @property int $updated_at
 */
class SystemSetting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'value', 'created_at', 'updated_at'], 'required'],
            [['value', 'description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['key', 'type'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'description' => Yii::t('app', 'Description'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SystemSettingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemSettingQuery(get_called_class());
    }
}
