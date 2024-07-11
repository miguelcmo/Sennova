<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group_member".
 *
 * @property int $id
 * @property int $group_id
 * @property int $user_id
 * @property int $role
 * @property int $status
 * @property int $joined_at
 * @property int|null $left_at
 *
 * @property Group $group
 * @property User $user
 */
class GroupMember extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'user_id', 'joined_at'], 'required'],
            [['group_id', 'user_id', 'role', 'status', 'joined_at', 'left_at'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
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
            'group_id' => Yii::t('app', 'Group ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'role' => Yii::t('app', 'Role'),
            'status' => Yii::t('app', 'Status'),
            'joined_at' => Yii::t('app', 'Joined At'),
            'left_at' => Yii::t('app', 'Left At'),
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery|GroupQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::class, ['id' => 'group_id']);
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
     * @return GroupMemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GroupMemberQuery(get_called_class());
    }
}
