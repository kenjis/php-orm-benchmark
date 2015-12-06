<?php

namespace model\yii2;

/**
 * @property string $title
 * @property Comment[] $comments
 */
class Post extends \yii\db\ActiveRecord
{
    public static $db;

    public static function getDb() {
        return static::$db;
    }

    public static function tableName()
    {
        return 'post';
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id'])->orderBy(['created_at' => SORT_DESC]);
    }
}
