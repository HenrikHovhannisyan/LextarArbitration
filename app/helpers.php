<?php
use Illuminate\Support\Facades\Route;
if(!function_exists('isActiveRoute')){
    function isActiveRoute($name, $default = 'active'){
        return Route::currentRouteName() == $name ? $default : false;
    }
}
