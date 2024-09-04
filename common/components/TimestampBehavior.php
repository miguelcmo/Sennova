<?php

namespace common\components;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class TimestampBehavior extends Behavior
{
    public $createdAtAttribute = 'created_at';
    public $updatedAtAttribute = 'updated_at';
    public $createdByAttribute = 'created_by';
    public $updatedByAttribute = 'updated_by';

    /**
     * {@inheritdoc}
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'handleBeforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'handleBeforeUpdate',
        ];
    }

    public function handleBeforeInsert($event)
    {
        $owner = $this->owner;
        $now = date('Y-m-d H:i:s');
        $userId = Yii::$app->user->id; // Assuming the user ID is available here

        if ($this->createdAtAttribute) {
            $owner->{$this->createdAtAttribute} = $now;
        }

        if ($this->updatedAtAttribute) {
            $owner->{$this->updatedAtAttribute} = $now;
        }

        if ($this->createdByAttribute && $userId) {
            $owner->{$this->createdByAttribute} = $userId;
        }

        if ($this->updatedByAttribute && $userId) {
            $owner->{$this->updatedByAttribute} = $userId;
        }
    }

    public function handleBeforeUpdate($event)
    {
        $owner = $this->owner;
        $now = date('Y-m-d H:i:s');
        $userId = Yii::$app->user->id; // Assuming the user ID is available here

        if ($this->updatedAtAttribute) {
            $owner->{$this->updatedAtAttribute} = $now;
        }

        if ($this->updatedByAttribute && $userId) {
            $owner->{$this->updatedByAttribute} = $userId;
        }
    }
}
