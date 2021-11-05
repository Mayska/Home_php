<?php

class Ctrhome
{
    // atrributs
    private $model;
    private $view;
    // constructeur par defaut
    function __construct(){
        // echo "constructeur par defaut de mon controleur";
        // intanciation de mon model et ma vu
        $this-> model = new Modelhome();
        $this-> view = new Viewhome();
    }

    // Methodes
    function getHome(){
        if(empty($_GET['p'])){
            $panel = 'home';
        }
        else{
            $panel= $_GET['p'];
        }
        $data = $this->model->getHome($panel);
        $this->view->afficherHome($data);
    }

    function getListe(){
        if($_SESSION['connect']){
            $data = $this->model->getListe();
            $selectBox = $this->model->getListSelectBox();
            $this->view->afficherListeSelect($data,$selectBox);
        }
        else{
            $this->getHome();
        }
        
    }

    function getListeTrier($categorie){
        $data = $this->model->getListeTrie($categorie);
    }

    function getFormulaire()
    {
        if($_SESSION['connect']){
            $id = $_GET['p'];
            $data = $this->model->getFormulaire($id);
            $this->view->afficherFormulaire($data);
        }
        else{
            $this->getHome();
        }
    } 

    function saveFormulaire(){
        $data = array(
            'id'=>$_POST['id'],
            'nom'=> $_POST['nom'],
            'categorie'=> $_POST['categorie'],
            'image'=> $_POST['image'],
            'lien'=> $_POST['lien']
        );
        $this->model->saveFormulaire($data);
        $data = $this->model->getListe();
        $this->view->afficherListe($data);
    }

    function modifEtat(){
        $id = $_GET['p'];
        $this->model->getModifEtat($id);
        $this->getListe();
    }

    function supprFormulaire(){
        $id = $_GET['p'];
        $this->model->supprFormulaire($id);
        $this->getListe();
    }

    function getTrieList(){
        $categorie = $_POST['categorie'];
        if( $categorie == "tout"){
            $this->getListe();
        }
        else{
            $data = $this->model->getListeTrier($categorie);
            $selectBox = $this->model->getListSelectBox();
            $this->view->afficherListeSelect($data,$selectBox);
        }
    }

    function getLogIn(){
        $this->view->afficherFormLogin();
    }

    function getPostLogIn()
    {   
        if($_POST['log'] == "alex" && $_POST['mdp'] == "alex"){
            $_SESSION['connect'] = true;
            $this->getListe();
        }
        else{
            $this->view->afficherFormLogin();
        }
    }
    function getTest(){
        echo json_encode("{test:'test'}");
    }

    function getLogOut(){
        $_SESSION['connect'] = false;
        $this->getHome();
    }

    function getParmetre(){
        $data = $this->model->getListCategorie();
        $this->view->afficherParametre($data);
    }

    function getDarwin(){
        $data = $this->model->getDarwinText();
        $this->view->afficherDarwin($data['text']);
    } 

    /*
    function getFlux(){
        $rssData = array();
        (string) $today = date("d-m-Y");
        $urlFlux = 'https://webnext.fr/epg_cache/programme-tv-rss_'.$today.'.xml';
        $rss = simplexml_load_file($urlFlux);
        $i=0;
        foreach ($rss->channel->item as $item){
            $rssData[$i] = [ 
                title => (string) $item->title,
                link => (string) $item->link,
                category => (string) $item->category , 
                description => (string) $item->description,
                comments => (string) $item->comments
            ];
            $i++;
        }
        $obj = json_encode($rssData);
        echo($obj);
    }
    */
}
?>
