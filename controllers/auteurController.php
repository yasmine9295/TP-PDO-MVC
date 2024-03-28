<?php
$action=$_GET['action'];

switch($action){
    case 'list' : 
    $lesAuteurs=Auteur::findAll();
    include('vues/listeAuteurs.php');
    break;
    case 'add' :
        $mode="Ajouter";
        include('vues/formAuteur.php');
    break;
    case 'update' :
        $mode="Modifier";
        $Auteurs=Auteur::findById($_GET['num']);
        include('vues/formAuteur.php');
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

    case 'valideForm' : 
        $auteur= new Auteur();
        if(empty($_POST['num'])) {// cas d'une création
            $auteur->setNom($_POST['libelle']);
            $nb=Auteur::add($auteur);
            $message = "ajouté";
        }else{ // cas d'une modif
            $auteur->setNum($_POST['libelle']);
            $auteur->setNom($_POST['libelle']);
            $nb=Auteur::update($auteur);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"Le auteur a bien été $message"];       
        }else{
            $_SESSION['message']=["success"=>"Le auteur a bien été $message"];
        }
        header('location: index.php?uc=auteurs&action=list');
    exit();
    break;
}