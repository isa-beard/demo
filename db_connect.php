<?php

define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DSN', 'mysql:host=localhost; dbname=plantsshop; charset=utf8');

function db_connect(){
    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    return $dbh;
}

?>