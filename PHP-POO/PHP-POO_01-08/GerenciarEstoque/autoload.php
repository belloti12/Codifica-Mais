<?php

spl_autoload_register(function($className) {
    $file = __DIR__ . "\\" . $className . ".php";
    // echo $file;
    // exit();
    if (file_exists($file)) {
        require_once $file;
    }
});
