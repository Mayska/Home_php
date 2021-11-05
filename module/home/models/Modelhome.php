<?php

/**
 * Modelmapage short summary.
 *
 * Modelmapage description.
 *
 * @version 1.0
 * @author alex
 */
class Modelhome
{
    // attributs
    private $dao;
    // constructeur par defaut de la class Model
    public function __construct(){
       // echo "constructeur par defaut de mon Model => ";
       // $this-> dao = new DAO_MySQLi();
       $this-> dao = new DAO_SQLite();
    }

    // Methodes
    function getHome($panel){
        $sql = 'SELECT * FROM home WHERE etat="oui" AND categorie="'.$panel.'"';
        $data = $this->dao->bddQuery($sql);
        return $data;
    }

    function getListe(){
        $sql = 'SELECT * FROM home';
        $data = $this->dao->bddQuery($sql);
        return $data;
    }

    function getFormulaire($id)
    {
        if($id!='add'){
            $sql = 'SELECT * FROM home WHERE id='.$id;
            $data = $this->dao->bddQuery($sql);
            $data = $data[0];
        }
        else{
            $data = array(
                'id'=>'',
                'nom'=>'',
                'categorie'=>'',
                'image'=>'',
                'lien'=>'',
                'etat'=>''
            );
        }
        // Construction du select
        $categorie = $this->getListSelectBox();
        //$sql = 'SELECT categorie FROM home GROUP BY categorie ORDER BY categorie';
        //$categorie['categorie'] = $this->dao->bddList($sql);
        array_push($data, $categorie);
        return $data;
    }

    function saveFormulaire($data){
        if($data['id']==''){
            $sqlId="SELECT MAX(id) AS id FROM home;";
            $sqlId = $this->dao->bddQuery($sqlId);
            $id = $sqlId[0]['id'];
            $id=$id+1;
            $sql="INSERT INTO home VALUES (
                'oui',
                $id,
                '".$data['categorie']."',
                '".$data['image']."',
                '".$data['lien']."',
                '".$data['nom']."'
            )";
        }
        else{
            $sql="UPDATE home SET
                categorie='".$data['categorie']."', 
                image='".$data['image']."', 
                lien='".$data['lien']."',
                nom='".$data['nom']."' 
                WHERE id=".$data['id'];
        }
        //echo($sql);
        $this->dao->bddSave($sql);
    }

    function getModifEtat($id){
        $sqlEtat = 'SELECT etat FROM home WHERE id='.$id;
        $sqlEtat = $this->dao->bddQuery($sqlEtat);
        $etat = $sqlEtat[0]['etat'];
        if($etat == 'oui')
        {
            $sql = 'UPDATE home SET etat="non" WHERE id='.$id;
        }
        else{
            $sql = 'UPDATE home SET etat="oui" WHERE id='.$id;
        }
        //echo($sql);
        $this->dao->bddQuery($sql);
    }

    function supprFormulaire($id){
        $sql="DELETE FROM home WHERE id=".$id;
        $this->dao->bddQuery($sql);
    }

    function getListSelectBox(){
        $sql = 'SELECT categorie FROM home GROUP BY categorie ORDER BY categorie';
        $data = $this->dao->bddList($sql);
        return $data;
    }

    function getListeTrier($categorie){
        $sql = 'SELECT * FROM home WHERE categorie ="'.$categorie.'"';
        $data = $this->dao->bddQuery($sql);
        return $data;
    }

    function getListCategorie(){
        $sql = 'SELECT * FROM parametre';
        $datas = $this->dao->bddQuery($sql);
        foreach($datas as $d){
            $data[] = $d;
        }
        return $data;
    }



    function getDarwinText(){
        $sql = 'SELECT * FROM darwin';
        $data = $this->dao->bddQuery($sql);
        $max = count($data)-1;
        $i = rand(0,$max);
        return $data[$i];
    }
}