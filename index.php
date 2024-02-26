<?php

require 'services/autoload.php';

session_start();
$router = new Router();

if(isset($_GET['path']))
{
    $router->checkRoute($_GET['path']);
}
else
{
    $router->checkRoute('');
}

?>