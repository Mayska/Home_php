<?php

/**
 * chargement automatique des fichiers de Class
 * @param string $class_name
 */

spl_autoload_register(function ($class_name){
    $modules = array(
        'module/home'
    );
    $repertoires = array(
        'controllers',
        'models',
        'views'
    );
    foreach ($modules as $module){
        foreach ($repertoires as $repertoire){
            if(file_exists("{$module}/{$repertoire}/{$class_name}.php"))
            {
                include_once("{$module}/{$repertoire}/{$class_name}.php");
            }
        }
    }
    if(file_exists("system/{$class_name}.php")){
        include_once ("system/{$class_name}.php");
    }
});