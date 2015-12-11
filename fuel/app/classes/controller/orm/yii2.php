<?php

use model\yii2\Post;
use model\yii2\Comment;

class Controller_Orm_Yii2 extends Controller_Base
{
    public function setup()
    {
        define('YII_DEBUG', false);
        $basePath = dirname(dirname(dirname(dirname(__DIR__)))); // go 4 up
        require($basePath . '/vendor/yiisoft/yii2/Yii.php');
        Yii::setAlias('@model', "$basePath/app/classes/model");

        $dbConfig = DbConfig::get_params();
        $db = new \yii\db\Connection([
            'dsn' => "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",
            'username' => $dbConfig['username'],
            'password' => $dbConfig['password'],
            'charset' => 'utf8',
        ]);
        Post::$db = $db;
        Comment::$db = $db;
    }

    public function action_get_one($id = 1)
    {
        $timeStart = microtime(true);
        $memoryStart = memory_get_usage();

        $this->setup();

        /** @var $post  \model\yii2\Post */
        $post = Post::findOne(['id' => $id]);
        
        echo $post->title . '<br>' . "\n";
        echo $post->comments[0]->body . '<br>' . "\n";
        
        echo microtime(true) - $timeStart . " secs<br>\n";
        echo (memory_get_usage() - $memoryStart)/1024 . " KB\n";
    }
}
