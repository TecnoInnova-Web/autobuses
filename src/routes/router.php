<?php

namespace routes; // routes

class Router {

 private static $routes = [];

    public static function get($uri, $callback){
        self::$routes['GET'][$uri] = $callback;
    }
    public static function post($uri, $callback){
        self::$routes['POST'][$uri] = $callback;
    }
}
?>