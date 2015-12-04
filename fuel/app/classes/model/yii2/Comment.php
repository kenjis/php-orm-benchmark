<?php

namespace model\yii2;

class Comment extends \yii\db\ActiveRecord
{
    public static $db;

    public static function getDb() {
        return static::$db;
    }

    public static function tableName()
    {
        return 'comment';
    }

    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
