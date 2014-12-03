<?php

class Model_Fuel_Orm_Comment extends Orm\Model
{
    protected static $_table_name = 'comment';
    
    protected static $_belongs_to = [
        'post' => [
            'key_from' => 'post_id',
            'model_to' => 'Model_Fuel_Orm_Post',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ]
    ];
}
