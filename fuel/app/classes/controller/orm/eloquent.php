<?php

class Controller_Orm_Eloquent extends Controller_Base
{
    public function setup()
    {
        $db = DbConfig::get_params();
        
        $capsule = new Illuminate\Database\Capsule\Manager;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $db['host'],
            'database'  => $db['dbname'],
            'username'  => $db['username'],
            'password'  => $db['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setEventDispatcher(
            new Illuminate\Events\Dispatcher(new Illuminate\Container\Container)
        );
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function action_get_one($id = 1)
    {
        $timeStart = microtime(true);
        $memoryStart = memory_get_usage();
        
        $this->setup();
        
        $post = Model_Eloquent_Post::findOrFail($id);
        echo $post->title . '<br>' . "\n";
        echo $post->comments[0]->body . '<br>' . "\n";
        
        echo microtime(true) - $timeStart . " secs<br>\n";
        echo (memory_get_usage() - $memoryStart)/1024 . " KB\n";
    }
}
