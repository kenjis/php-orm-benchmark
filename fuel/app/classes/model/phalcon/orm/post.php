<?php

class Model_Phalcon_Orm_Post extends Phalcon\Mvc\Model
{
    public function getSource()
    {
        return 'post';
    }
    
    public function initialize()
    {
        $this->hasMany('id', 'Model_Phalcon_Orm_Comment', 'post_id',
            ['alias' => 'comments']
        );
    }
}
