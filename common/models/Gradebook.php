<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gradebook".
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property int $item_id
 * @property float|null $grade
 * @property string|null $comments
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Course $course
 * @property GradeItem $item
 * @property User $user
 */
class Gradebook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gradebook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id', 'item_id', 'created_at', 'updated_at'], 'required'],
            [['course_id', 'user_id', 'item_id', 'created_at', 'updated_at'], 'integer'],
            [['grade'], 'number'],
            [['comments'], 'string'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => GradeItem::class, 'targetAttribute' => ['item_id' => 'id']],
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
            'course_id' => Yii::t('app', 'Course ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'item_id' => Yii::t('app', 'Item ID'),
            'grade' => Yii::t('app', 'Grade'),
            'comments' => Yii::t('app', 'Comments'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery|GradeItemQuery
     */
    public function getItem()
    {
        return $this->hasOne(GradeItem::class, ['id' => 'item_id']);
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
     * @return GradebookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GradebookQuery(get_called_class());
    }
}
