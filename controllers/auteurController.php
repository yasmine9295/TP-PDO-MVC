<?php
$action=$_GET['action'];

switch($action){
    case 'list' : 
        // traitement du formulaire de recherche
    $Nom="";
    $nationalitesel="Tous";
    if(!empty($_POST['Nom']) || !empty($_POST['nationalite'])){
        $Nom=$_POST['Nom'];
        $nationalitesel= $_POST['nationalite'];
    }
    $lesNationalites=Nationalite::findAll();
    $lesAuteurs=Auteur::findAll($Nom, $nationalitesel);
    include('vues/listeauteurs.php');
    break;
    case 'add' :
        $lesNationalites=Nationalite::findAll();
        $mode="Ajouter";
        include('vues/formAuteur.php');
    break;
    case 'update' :
        $lesNationalites=Nationalite::findAll();
        $mode="Modifier";
        $auteur=Auteur::findById($_GET['num']);
        include('vues/formauteur.php');
    break;
    case 'delete' : 
        $auteur=Auteur::findById($_GET['num']);
        $nb=Auteur::delete($auteur);
        if($nb==1){
            $_SESSION['message']=["success"=>"Le auteur a bien été supprimé"];       
        }else{
            $_SESSION['message']=["success"=>"Le auteur n'a pas été supprimé"];
        }
        header('location: index.php?uc=auteurs&action=list');
            exit();
    break;

    case 'valideForm':
        $auteur = new Auteur();
        if (empty($_POST['num'])) { // cas d'une création
            $auteur->setnom($_POST['Nom']);
            $nb = Auteur::add($auteur);
            $message = "ajouté";
        } else { // cas d'une modif
            $auteur->setnom($_POST['Nom']);
            $nb = Auteur::update($auteur);
            $message = "modifié";
        }
        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "L'auteur a bien été $message"];
        } else {
            $_SESSION['message'] = ["success" => "L'auteur a bien été $message"];
        }
        header('location: index.php?uc=auteurs&action=list');
        exit();
        break;
}