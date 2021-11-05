<?php

class DAO_SQLite extends SQLite3 implements dao 
{
    private $myBdd;
    private $config;


    function __construct()
    {
        $this->bddConnexion();
    }

    function bddConnexion(){
        $this->open(__DIR__.'/bdd/maBdd.db');    
    }
    function bddDeconnexion(){
        $this->close();
    }
    function bddQuery($sql){
        $data = array();
        if(!$result = $this->query($sql)){
            die("Ereur de BDD : MARCHE pas :(");
        }
        else{
            if(is_object($result)){
                while($row = $result->fetchArray(SQLITE3_ASSOC))
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

    function bddSave($sql){
        $this->query($sql);
    }

    function bddList($sql){
        $result = $this->query($sql);
        $data = array();
        while($row = $result->fetchArray(SQLITE3_ASSOC)){
            array_push($data, $row[key($row)]);
        }
        return $data;
    }

    function __destruct()
    {
        $this->bddDeconnexion();
    }
}
?>