<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assignment_submission".
 *
 * @property int $id
 * @property int $assignment_id
 * @property int $user_id
 * @property int $submitted_at
 * @property string|null $file_path
 * @property int|null $grade
 * @property string|null $comments
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Assignment $assignment
 * @property User $user
 */
class AssignmentSubmission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignment_submission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['assignment_id', 'user_id', 'submitted_at', 'created_at', 'updated_at'], 'required'],
            [['assignment_id', 'user_id', 'submitted_at', 'grade', 'status', 'created_at', 'updated_at'], 'integer'],
            [['comments'], 'string'],
            [['file_path'], 'string', 'max' => 255],
            [['assignment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assignment::class, 'targetAttribute' => ['assignment_id' => 'id']],
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
            'assignment_id' => Yii::t('app', 'Assignment ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'submitted_at' => Yii::t('app', 'Submitted At'),
            'file_path' => Yii::t('app', 'File Path'),
            'grade' => Yii::t('app', 'Grade'),
            'comments' => Yii::t('app', 'Comments'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Assignment]].
     *
     * @return \yii\db\ActiveQuery|AssignmentQuery
     */
    public function getAssignment()
    {
        return $this->hasOne(Assignment::class, ['id' => 'assignment_id']);
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
     * @return AssignmentSubmissionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssignmentSubmissionQuery(get_called_class());
    }
}
