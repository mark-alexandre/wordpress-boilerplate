<?php

// Composer autoload
if (file_exists(__DIR__.'/wp-content/themes/boilerplate/vendor/autoload.php')) {
    require_once (__DIR__.'/wp-content/themes/boilerplate/vendor/autoload.php');
}

// dd => dump & die function
if (! function_exists('dd')) {
    function dd () {
        dump(func_get_args()); die();
    }
}