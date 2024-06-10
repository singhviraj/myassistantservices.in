<?php

$host = "localhost";
$port = 3306;
$db_username = "u455380687_pss";
$db_password = "@6H==TDADh";
$db_name = "u455380687_physician";
require_once("Database.php");

$db=new Database($host, $port, $db_username, $db_password, $db_name);

function handleException($exception)
{
    echo  $exception->getMessage();
}

set_exception_handler('handleException');
