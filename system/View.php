<?php

/**
 * view short summary.
 *
 * view description.
 *
 * @version 1.0
 * @author alex
 */
class View
{
    // Methodes
    function afficherPage($template){
        $params = array (
            'module'=> 'home',
            'aside' => 'aside',
            'container' => 'container'
            );
        include "public/default.php";
    }

    function afficher($template,$data){
        $params = array (
            'module'=> 'home',
            'aside' => 'aside',
            'container' => 'container'
            );
        include "public/default.php";
    }

    function afficherSelect($template,$data,$selectBox){
        $params = array (
            'module'=> 'home',
            'aside' => 'aside',
            'container' => 'container'
            );
        include "public/default.php";
    }
}