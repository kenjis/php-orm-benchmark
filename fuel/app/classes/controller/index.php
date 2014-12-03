<?php

class Controller_Index extends Controller
{
    public function action_index()
    {
        $timeStart = microtime(true);
        $memoryStart = memory_get_usage();
        
        echo '<ul>';
        echo '<li>' . Html::anchor('orm/eloquent/get_one', 'Eloquent ORM');
        echo '<li>' . Html::anchor('orm/fuel/get_one', 'FuelPHP 1.x ORM');
        echo '<li>' . Html::anchor('orm/phalcon/get_one', 'Phalcon ORM');
        echo '</ul>';
        
        echo microtime(true) - $timeStart . " secs<br>\n";
        echo (memory_get_usage() - $memoryStart)/1024 . " KB\n";
    }
}
