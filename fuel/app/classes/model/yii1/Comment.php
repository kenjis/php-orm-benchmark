<?php

class Model_Yii1_Comment extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'comment';
    }

    public function relations()
    {
        return array(
            'post'=>array(self::HAS_ONE, 'Model_Yii1_Post', 'post_id'),
        );
    }
}
