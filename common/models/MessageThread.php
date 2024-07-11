<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message_thread".
 *
 * @property int $id
 * @property string $subject
 * @property int $created_at
 * @property int $updated_at
 */
class MessageThread extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message_thread';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject' => Yii::t('app', 'Subject'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MessageThreadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageThreadQuery(get_called_class());
    }
}
