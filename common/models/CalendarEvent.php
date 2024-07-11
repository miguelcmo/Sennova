<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendar_event".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $start_date
 * @property string|null $end_date
 * @property int|null $all_day
 * @property string|null $location
 * @property int $created_at
 * @property int $updated_at
 */
class CalendarEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_date', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['all_day', 'created_at', 'updated_at'], 'integer'],
            [['title', 'location'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'all_day' => Yii::t('app', 'All Day'),
            'location' => Yii::t('app', 'Location'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CalendarEventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalendarEventQuery(get_called_class());
    }
}
