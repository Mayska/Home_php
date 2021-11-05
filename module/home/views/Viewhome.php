<?php

/**
 * Class1 short summary.
 *
 * Class1 description.
 *
 * @version 1.0
 * @author alex
 */
class Viewhome extends View
{
    function __construct(){
        //echo "constructeur par defaut de ma Viewhome => ";
    }

    // methodes
    function afficherHome($data){
        $template = 'home';
        $this->afficher($template,$data);
    }

    function afficherListe($data){
        $template = 'liste';
        $this->afficher($template,$data);
    }

    function afficherListeSelect($data,$selectBox){
        $template = 'liste';
        $this->afficherSelect($template,$data,$selectBox);
    }

    function afficherFormulaire($data){
        $template = 'formulaire';
        $this->afficher($template,$data);
    }

    function afficherFormLogin(){
        $template = 'login';
        $this->afficherPage($template);
    }

    function afficherParametre($data){
        $template = 'parametre';
        $this->afficher($template,$data);
    }

    function afficherDarwin($data){
        $template = 'darwin';
        $this->afficher($template,$data);
    }

}