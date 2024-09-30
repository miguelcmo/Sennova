<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $firstName
 * @property string $lastName
 * @property string|null $govTypeId
 * @property string|null $govId
 * @property string|null $gender
 * @property string|null $initials
 * @property string|null $profession
 * @property string|null $ocupation
 * @property string|null $role
 * @property string|null $alias
 * @property string|null $image
 * @property string|null $email
 * @property string|null $telephone
 * @property string|null $education
 * @property string|null $location
 * @property string|null $skills
 * @property string|null $notes
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
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
            [['user_id', 'firstName', 'lastName'], 'required'],
            [['user_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['firstName', 'lastName', 'govTypeId', 'govId', 'gender', 'initials', 'profession', 'ocupation', 'role', 'alias', 'image', 'email', 'telephone', 'education', 'location', 'skills', 'notes'], 'string', 'max' => 255],
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
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'govTypeId' => Yii::t('app', 'Gov Type ID'),
            'govId' => Yii::t('app', 'Gov ID'),
            'gender' => Yii::t('app', 'Gender'),
            'initials' => Yii::t('app', 'Initials'),
            'profession' => Yii::t('app', 'Profession'),
            'ocupation' => Yii::t('app', 'Ocupation'),
            'role' => Yii::t('app', 'Role'),
            'alias' => Yii::t('app', 'Alias'),
            'image' => Yii::t('app', 'Image'),
            'email' => Yii::t('app', 'Email'),
            'telephone' => Yii::t('app', 'Telephone'),
            'education' => Yii::t('app', 'Education'),
            'location' => Yii::t('app', 'Location'),
            'skills' => Yii::t('app', 'Skills'),
            'notes' => Yii::t('app', 'Notes'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
