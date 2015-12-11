<?php

class Controller_Orm_Yii1 extends Controller_Base
{
    public function setup()
    {
        define('YII_DEBUG', false);
        $basePath = dirname(dirname(dirname(dirname(__DIR__)))); // go 4 up
        require($basePath . '/vendor/yiisoft/yii/framework/yii.php');
        require_once("$basePath/app/classes/model/yii1/Comment.php");
        require_once("$basePath/app/classes/model/yii1/Post.php");

        $dbConfig = DbConfig::get_params();
        $db = new CDbConnection(
            "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8",
            $dbConfig['username'],
            $dbConfig['password']
        );
        CActiveRecord::$db = $db;
    }

    public function action_get_one($id = 1)
    {
        $timeStart = microtime(true);
        $memoryStart = memory_get_usage();

        $this->setup();

        $post = Model_Yii1_Post::model()->findByPk($id);
        
        echo $post->title . '<br>' . "\n";
        echo $post->comments[0]->body . '<br>' . "\n";
        
        echo microtime(true) - $timeStart . " secs<br>\n";
        echo (memory_get_usage() - $memoryStart)/1024 . " KB\n";
    }
}
