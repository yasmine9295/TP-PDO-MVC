<?php ob_start();
 session_start(); 
include "vues/header.php";
include "modeles/Continent.php";
include "modeles/monPdo.php";
include "vues/messagesFlash.php";
include "modeles/Auteur.php";
include "modeles/Livre.php";
include "modeles/Genre.php";
include "modeles/Nationalite.php";

$uc =empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil' :
        include('vues/accueil.php');
        break;
    case 'continents' :
        include('controllers/continentController.php');
        break;
    case 'auteurs' :
        include('controllers/auteurController.php');
        break;
    case 'livres' :
        include('controllers/livreController.php');
        break;
    case 'genres' :
        include('controllers/genreController.php');
        break;
        case 'nationalite' :
            include('controllers/nationaliteController.php');
            break;
}

include "vues/footer.php";?>