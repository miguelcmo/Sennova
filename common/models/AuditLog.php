<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "audit_log".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $action
 * @property string $model
 * @property int $model_id
 * @property string|null $field
 * @property string|null $from_value
 * @property string|null $to_value
 * @property int $created_at
 *
 * @property User $user
 */
class AuditLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'audit_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'model_id', 'created_at'], 'integer'],
            [['action', 'model', 'model_id', 'created_at'], 'required'],
            [['from_value', 'to_value'], 'string'],
            [['action', 'model', 'field'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'action' => Yii::t('app', 'Action'),
            'model' => Yii::t('app', 'Model'),
            'model_id' => Yii::t('app', 'Model ID'),
            'field' => Yii::t('app', 'Field'),
            'from_value' => Yii::t('app', 'From Value'),
            'to_value' => Yii::t('app', 'To Value'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return AuditLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuditLogQuery(get_called_class());
    }
}
