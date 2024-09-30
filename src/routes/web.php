<?php 

use  routes\Router;

Router::get('/', function () {
    include_once 'src/views/admin/login.php';
});

Router::get('/usuarios', function () {
    echo 'usuarios';
});

?>