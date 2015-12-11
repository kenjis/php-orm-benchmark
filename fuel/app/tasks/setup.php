<?php

namespace Fuel\Tasks;

class Setup
{
    public function propel2()
    {
        passthru(
            'cd ' . APPPATH . '..;
            vendor/bin/propel config:convert'
        );
    }

    public function mysql()
    {
        $db = \DbConfig::get_params();
        $dbname = $db['dbname'];

        $scheme_sql = 'CREATE DATABASE IF NOT EXISTS `' . $dbname . '`;';
        $scheme_sql .= 'DROP TABLE IF EXISTS `comment`;';
        $scheme_sql .= 'DROP TABLE IF EXISTS `post`;';
        $scheme_sql .= file_get_contents(APPPATH . '../../schema/php_dev.sql');

        foreach (explode(';', $scheme_sql) as $sql) {
          if (preg_match('/^\n$/u', $sql)) {
            continue;
          }

          $result = \DB::query($sql)->execute();
          if ($result) {
              \Cli::write(\Cli::color($sql, 'green'));
          } else {
              \Cli::error(\Cli::color($sql, 'red'));
          }
        }
    }
}
