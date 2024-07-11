<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property int $payment_date
 * @property int $status
 * @property string $method
 * @property string|null $transaction_id
 * @property string|null $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Subscription[] $subscriptions
 * @property User $user
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'amount', 'payment_date', 'method', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'payment_date', 'status', 'created_at', 'updated_at'], 'integer'],
            [['amount'], 'number'],
            [['description'], 'string'],
            [['method', 'transaction_id'], 'string', 'max' => 255],
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
            'amount' => Yii::t('app', 'Amount'),
            'payment_date' => Yii::t('app', 'Payment Date'),
            'status' => Yii::t('app', 'Status'),
            'method' => Yii::t('app', 'Method'),
            'transaction_id' => Yii::t('app', 'Transaction ID'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Subscriptions]].
     *
     * @return \yii\db\ActiveQuery|SubscriptionQuery
     */
    public function getSubscriptions()
    {
        return $this->hasMany(Subscription::class, ['payment_id' => 'id']);
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
     * @return PaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentQuery(get_called_class());
    }
}
