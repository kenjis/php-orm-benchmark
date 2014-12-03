<?php

class Model_Phalcon_Orm_Comment extends Phalcon\Mvc\Model
{
    public function getSource()
    {
        return 'comment';
    }
    
    public function initialize()
    {
        $this->belongsTo('post_id', 'Model_Phalcon_Orm_Post', 'id');
    }
}
