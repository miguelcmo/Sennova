<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property int|null $gov_id_type
 * @property string|null $gov_id
 * @property string|null $gender
 * @property string|null $phone_number
 * @property string|null $birth_date
 * @property int|null $visibility
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Address[] $addresses
 * @property ProfileInfo[] $profileInfos
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gov_id_type', 'visibility', 'created_by', 'updated_by'], 'integer'],
            [['birth_date', 'created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'gov_id', 'gender', 'phone_number'], 'string', 'max' => 255],
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
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'gov_id_type' => Yii::t('app', 'Gov Id Type'),
            'gov_id' => Yii::t('app', 'Gov ID'),
            'gender' => Yii::t('app', 'Gender'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'birth_date' => Yii::t('app', 'Birth Date'),
            'visibility' => Yii::t('app', 'Visibility'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery|AddressQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class, ['profile_id' => 'id']);
    }

    /**
     * Gets query for [[ProfileInfos]].
     *
     * @return \yii\db\ActiveQuery|ProfileInfoQuery
     */
    public function getProfileInfos()
    {
        return $this->hasMany(ProfileInfo::class, ['profile_id' => 'id']);
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
     * Gets query for [[GovIdType]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getGovIdType()
    {
        return $this->hasOne(GovIdType::class, ['id' => 'gov_id_type']);
    }

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
