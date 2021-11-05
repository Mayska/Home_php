<?php

//http://mayska.alwaysdata.net/
//https://admin.alwaysdata.com
//mayska
//Alex22v10
//include "autoload.php";

//phpmyadmin => https://phpmyadmin.alwaysdata.com/

/*
// EN LIGNE
 $this->config = array(
'host'  =>  "mysql-mayska.alwaysdata.net",
'user'  =>  "mayska",
'password'  =>"Alex22v10",
'database'=> "mayska_bdd_home",
//'port'=> 3306,
'charset' => "utf8"
);

// TESTE
$this->config = array(
'host'  =>  "localhost",
'user'  =>  "root",
'password'  =>"",
'database'=> "mayska_bdd_home",
//'port'=> 3306,
'charset' => "utf8"
);
 * */

class DAO_MySQLi implements dao {


    private $myBdd;
    private $config;

    public function __construct(){
        $this->config = config::$bdd[config::$mode];
        //$this->bddConnexion();
    }

    public function bddConnexion(){
        $this->myBdd = new mysqli(
            $this->config['host'],
            $this->config['user'],
            $this->config['password'],
            //$this->config['port'],
            $this->config['database']
        );
        if($this->myBdd->connect_errno){
            die("Ereur de connexion : {$this->myBdd->connect_errno}");
        }
        else{
            mysqli_set_charset($this->myBdd, $this->config['charset']);
        }
    }


    public function bddDeconnexion(){
        $this->myBdd->close();
    }

    public function bddQuery($sql){
        $this->bddConnexion();
        // echo $sql;
        $data = array();
        if(!$result = $this->myBdd->query($sql)){
            die("Ereur de BDD : {$this->myBdd->connect_errno}");
        }
        else{
            if(is_object($result)){
                while($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
                return $data;
            }
            else{
                //
            }
        }
    }

    public function bddSave($sql){

    }

    public function bddList($sql)
    {
        # code...
    }

    public function __destruct(){
        $this->bddDeconnexion();
    }


}
