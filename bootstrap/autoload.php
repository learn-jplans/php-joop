<?php
//set paths
$paths = array(APP_PATH, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $paths));

// php magic function that automatically load class file if not exist
function __load_libraries($className)
{
    $filename = str_replace('\\', '/', $className . '.php');
    require_once $filename;
}
spl_autoload_register('__load_libraries');