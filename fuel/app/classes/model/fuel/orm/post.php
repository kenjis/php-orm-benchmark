<?php

class Model_Fuel_Orm_Post extends Orm\Model
{
    protected static $_table_name = 'post';
    
    protected static $_has_many = [
        'comments' => [
            'key_from' => 'id',
            'model_to' => 'Model_Fuel_Orm_Comment',
            'key_to' => 'post_id',
            'cascade_save' => false,
            'cascade_delete' => true,
            'conditions' => ['order_by' => ['created_at' => 'desc']]
        ]
    ];
}
