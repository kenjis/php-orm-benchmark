<?php

class Controller_Orm_Fuel extends Controller_Base
{
    public function action_get_one($id = 1)
    {
        $timeStart = microtime(true);
        $memoryStart = memory_get_usage();
        
        Package::load('orm');
        
        $post = Model_Fuel_Orm_Post::find($id);
        echo $post->title . '<br>' . "\n";
        $comment = array_shift($post->comments);
        echo $comment->body . '<br>' . "\n";
        
        echo microtime(true) - $timeStart . " secs<br>\n";
        echo (memory_get_usage() - $memoryStart)/1024 . " KB\n";
    }
}
