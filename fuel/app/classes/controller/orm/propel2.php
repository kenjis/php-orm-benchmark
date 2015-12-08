<?php

use \propel2\PostQuery;

class Controller_Orm_Propel2 extends Controller_Base
{

    public function setup()
    {
        require_once(APPPATH . '../generated-conf/config.php');
    }

    public function action_get_one($id = 1)
    {
        $timeStart = microtime(true);
        $memoryStart = memory_get_usage();
        
        $this->setup();
        
        $post = PostQuery::create()->findPk($id);

        echo $post->getTitle() . '<br>' . "\n";
        $comments = $post->getComments();
        echo $comments[0]->getBody() . '<br>' . "\n";
        
        echo microtime(true) - $timeStart . " secs<br>\n";
        echo (memory_get_usage() - $memoryStart)/1024 . " KB\n";
    }
}
