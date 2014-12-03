<?php

class Model_Eloquent_Post extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'post';
    
    public function comments()
    {
        return $this->hasMany('Model_Eloquent_Comment', 'post_id')->orderBy('created_at', 'dsc');
    }
}
