<?php

class Controller_Base extends Controller
{
    protected function get_db_params()
    {
        \Config::load('db', true);
        $dsn = \Config::get('db.default.connection.dsn');
        list($driver, $tmp) = explode(':', $dsn);
        list($hostStr, $dbnameStr) = explode(';', $tmp);
        list($tmp, $host) = explode('=', $hostStr);
        list($tmp, $dbname) = explode('=', $dbnameStr);
        $username = \Config::get('db.default.connection.username');
        $password = \Config::get('db.default.connection.password');
        
        return [
            'host' => $host,
            'dbname' => $dbname,
            'username' => $username,
            'password' => $password,
        ];
    }
}
