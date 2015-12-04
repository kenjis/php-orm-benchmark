<?php

/**
 * @property string $title
 * @property Model_Yii1_Comment[] $comments
 */
class Model_Yii1_Post extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'post';
    }

    public function relations()
    {
        return array(
            'comments'=>array(self::HAS_MANY, 'Model_Yii1_Comment', 'post_id', 'order' => 'created_at DESC'),
        );
    }
}
