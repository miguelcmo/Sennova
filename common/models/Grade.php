<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property int $id
 * @property int $grade_item_id
 * @property int $user_id
 * @property float $grade
 * @property string|null $comments
 * @property int|null $graded_by
 * @property int|null $graded_at
 * @property int $created_at
 * @property int $updated_at
 *
 * @property GradeItem $gradeItem
 * @property User $gradedBy
 * @property User $user
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_item_id', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['grade_item_id', 'user_id', 'graded_by', 'graded_at', 'created_at', 'updated_at'], 'integer'],
            [['grade'], 'number'],
            [['comments'], 'string'],
            [['graded_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['graded_by' => 'id']],
            [['grade_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => GradeItem::class, 'targetAttribute' => ['grade_item_id' => 'id']],
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
            'grade_item_id' => Yii::t('app', 'Grade Item ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'grade' => Yii::t('app', 'Grade'),
            'comments' => Yii::t('app', 'Comments'),
            'graded_by' => Yii::t('app', 'Graded By'),
            'graded_at' => Yii::t('app', 'Graded At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[GradeItem]].
     *
     * @return \yii\db\ActiveQuery|GradeItemQuery
     */
    public function getGradeItem()
    {
        return $this->hasOne(GradeItem::class, ['id' => 'grade_item_id']);
    }

    /**
     * Gets query for [[GradedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getGradedBy()
    {
        return $this->hasOne(User::class, ['id' => 'graded_by']);
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
     * @return GradeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GradeQuery(get_called_class());
    }
}
