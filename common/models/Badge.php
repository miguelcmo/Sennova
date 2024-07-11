<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "badge".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 * @property string $criteria
 * @property int $created_at
 * @property int $updated_at
 *
 * @property BadgeAward[] $badgeAwards
 */
class Badge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'badge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'criteria', 'created_at', 'updated_at'], 'required'],
            [['description', 'criteria'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'icon' => Yii::t('app', 'Icon'),
            'criteria' => Yii::t('app', 'Criteria'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[BadgeAwards]].
     *
     * @return \yii\db\ActiveQuery|BadgeAwardQuery
     */
    public function getBadgeAwards()
    {
        return $this->hasMany(BadgeAward::class, ['badge_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BadgeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BadgeQuery(get_called_class());
    }
}
