<?php

class DbConfig
{
    private static $params = [];

    public static function get_params()
    {
        if (static::$params !== []) {
            return static::$params;
        }

        \Config::load('db', true);
        $dsn = \Config::get('db.default.connection.dsn');
        list($driver, $tmp) = explode(':', $dsn);
        list($hostStr, $dbnameStr) = explode(';', $tmp);
        list($tmp, $host) = explode('=', $hostStr);
        list($tmp, $dbname) = explode('=', $dbnameStr);
        $username = \Config::get('db.default.connection.username');
        $password = \Config::get('db.default.connection.password');

        static::$params = [
            'host' => $host,
            'dbname' => $dbname,
            'username' => $username,
            'password' => $password,
        ];

        return static::$params;
    }
}
