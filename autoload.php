<?php
// autoload classes
spl_autoload_register(function ($class_name) {
    $dir = 'src/';
    if(!file_exists( $dir.$class_name . '.php')) throw new Exception("Unable to load class - $class_name.");
    include $dir.$class_name . '.php';
});

?>