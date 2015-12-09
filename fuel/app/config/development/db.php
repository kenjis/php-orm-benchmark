<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=' . (getenv('DB_HOSTNAME') ? getenv('DB_HOSTNAME') : 'localhost') . ';dbname=' . (getenv('DB_NAME') ? getenv('DB_NAME') : 'php_dev'),
			'username'   => getenv('DB_USER') ? getenv('DB_USER') : 'root',
			'password'   => getenv('DB_PW') ? getenv('DB_PW') : 'root',
		),
	),
);
