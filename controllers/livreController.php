<?php
$action=$_GET['action'];

switch($action){
    case 'list' : 
        // traitement du formulaire de recherche
    $isbn="";
    $genreSel="Tous";
    $auteursel="Tout";
    if(!empty($_POST['isbn']) || !empty($_POST['genre'])){
        $isbn=$_POST['isbn'];
        $genreSel= $_POST['genre'];
        $auteurSel= $_POST['genre'];
    }
    $lesGenres=Genre::findAll();
    $lesAuteurs=Auteur::findAll();
    $lesLivres=Livre::findAll($isbn, $genreSel);
    include('vues/listeLivres.php');
    break;
    case 'add' :
        $lesLivres=Livre::findAll();
        $lesGenres=Genre::findAll();
        $lesAuteurs=Auteur::findAll();
        $mode="Ajouter";
        include('vues/formLivre.php');
    break;
    case 'update' :
        $lesLivres=Livre::findAll();
        $lesGenres=Genre::findAll();
        $lesAuteurs=Auteur::findAll();
        $mode="Modifier";
        $livre=Livre::findById($_GET['isbn']);
        include('vues/formLivre.php');
    break;
    case 'delete' : 
      
        $livre=Livre::findById($_GET['isbn']);
        $nb=Livre::delete($livre);
        if($nb==1){
            $_SESSION['message']=["success"=>"Le livre a bien été supprimé"];       
        }else{
            $_SESSION['message']=["success"=>"Le livre n'a pas été supprimé"];
        }
        header('location: index.php?uc=livres&action=list');
            exit();
    break;

    case 'valideForm' : 
        $livre= new Livre();
        if(empty($_POST['isbn'])) {// cas d'une création
            $livre->setTitre($_POST['titre']);
            $nb=Livre::add($livre);
            $message = "ajouté";
        }else{ // cas d'une modif
            $livre->setisbn($_POST['titre']);
            $livre->setTitre($_POST['titre']);
            $nb=Livre::update($livre);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"Le livre a bien été $message"];       
        }else{
            $_SESSION['message']=["success"=>"Le livre a bien été $message"];
        }
        header('location: index.php?uc=livres&action=list');
    exit();
    break;
}