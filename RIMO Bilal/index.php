<?php
/**
 * definition d'un constance qui vas permetre de se placer à la racine du projet.
 */
session_start(); 
define('ROOT',dirname(__FILE__));
define('WARNING','');

function chargerClasse($classe){

    if (preg_match("/Controler/i",$classe))
        $racine = 'Controler/';
    else
        $racine = 'Model/';

    require $racine.''.$classe.'.php' ;// on inclut la classe
}

spl_autoload_register('chargerClasse');

if(isset($_GET["page"])){    
    $p = $_GET["page"];
}else{
    $p = 'home';
}

ob_start();

switch ($p){

     case "vente":
        $controler = new VenteControler();
        $controler->showArticleVente();
        //require_once'ViewFrontend/vente.php';
        break;
    case "tchat":
        $controler = new TchatControler();
        $controler->showMessage();
        break;
    case "blog":
        $controler = new BlogControler();
        $controler->showBlog();
        break;
    case "admin":
        $controler = new AdminControler();
        $controler->administrationDuSite();
        require_once'Administration/administration.php';
        break;
    case "login":
        $controler = new UsersControler();
        $controler->login();
        break;
    case "signup":
        $controler = new UsersControler();
        $controler->signUp();
        
        break;
    default :
        require_once'ViewFrontend/home.php';

}

$content = ob_get_clean();

require_once(ROOT.'/Template/template.php');