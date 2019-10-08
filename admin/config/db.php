<?php 
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "furniture";

foreach ($db as $key => $values ){
    
    define(strtoupper($key), $values);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

