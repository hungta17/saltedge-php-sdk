<?php
/**
 * Created by PhpStorm.
 * User: Hung Tran
 * Date: 2017-09-19
 * Time: 10:07 AM
 */

/*
 * You only need this file if you are not using composer.
 */
if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    throw new Exception('The Saltedge SDK requires PHP version 5.4 or higher.');
}

/*
 * Register the autoloader for Saltedge SDK
 *
 * Base off the official PSR-4 autoloader example found here:
 * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
 */
spl_autoload_register(function ($class) {
    // Rainmakerlabs\Saltedge class prefix
    $prefix = 'Rainmakerlabs\\Saltedge\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__.'/src/';

    //does the class use the registered autoloader
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    //replace the namespace prefix with the base directory, replace namespace
    // separators with directory sparators in the relative class name, append
    // with .php

    $file = $base_dir.str_replace('\\', '/', $relative_class).'.php';

    //if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
