<?php

namespace common\models;

use Yii;
use common\components\TimestampBehavior;

/**
 * This is the model class for table "profile_info".
 *
 * @property int $id
 * @property int $profile_id
 * @property string|null $profile_picture
 * @property string|null $bio
 * @property string|null $website
 * @property string|null $social_links
 * @property string|null $occupation
 * @property string|null $company
 * @property string|null $industry
 * @property int|null $years_experience
 * @property int|null $visibility
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Profile $profile
 */
class ProfileInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profile_id'], 'required'],
            [['profile_id', 'years_experience', 'visibility', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['profile_picture', 'bio', 'website', 'social_links', 'occupation', 'company', 'industry'], 'string', 'max' => 255],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'profile_id' => Yii::t('app', 'Profile ID'),
            'profile_picture' => Yii::t('app', 'Profile Picture'),
            'bio' => Yii::t('app', 'Bio'),
            'website' => Yii::t('app', 'Website'),
            'social_links' => Yii::t('app', 'Social Links'),
            'occupation' => Yii::t('app', 'Occupation'),
            'company' => Yii::t('app', 'Company'),
            'industry' => Yii::t('app', 'Industry'),
            'years_experience' => Yii::t('app', 'Years Experience'),
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
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'profile_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProfileInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileInfoQuery(get_called_class());
    }
}
