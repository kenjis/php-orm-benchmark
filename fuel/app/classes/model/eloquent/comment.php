<?php

class Model_Eloquent_Comment extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'comment';
    
    public function comments()
    {
        return $this->belongsTo('Post', 'post_id');
    }
}
