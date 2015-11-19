<?php

class Controller_Orm_Phalcon extends Controller_Base
{
    public function setup()
    {
        $db = $this->get_db_params();
        
        $di = new Phalcon\DI();
        $di->set('modelsManager', function() {
             return new Phalcon\Mvc\Model\Manager();
        });
        $di->set('db', function () use ($db) {
            return new Phalcon\Db\Adapter\Pdo\Mysql([
                'host'     => $db['host'],
                'username' => $db['username'],
                'password' => $db['password'],
                'dbname'   => $db['dbname'],
            ]);
        });
        $di->set('modelsMetadata', function () {
            return new Phalcon\Mvc\Model\Metadata\Memory();
        });
    }

    public function action_get_one($id = 1)
    {
        $timeStart = microtime(true);
        $memoryStart = memory_get_usage();
        
        $this->setup();
        
        $post = Model_Phalcon_Orm_Post::findFirst($id);
        echo $post->title . '<br>' . "\n";
        $comment = $post->getComments(["order" => "created_at DESC"]);
        echo $comment[0]->body . '<br>' . "\n";
        
        echo microtime(true) - $timeStart . " secs<br>\n";
        echo (memory_get_usage() - $memoryStart)/1024 . " KB\n";
    }
}
