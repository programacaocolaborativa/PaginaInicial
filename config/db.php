<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 19/05/17
 * Time: 23:32
 */
//mysql://b06ff4aebd980e:ec8e55a0@us-cdbr-iron-east-03.cleardb.net/heroku_a2c4859427bd568?reconnect=true
return [
    "default_connection" => [
        'driver' => getenv('DB_DRIVER'),
        'host' => getenv('DB_HOST'),
        'database' => getenv('DB_DATABASE'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci'
    ]
];