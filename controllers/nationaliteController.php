<?php
$action=$_GET['action'];

switch($action){
    case 'list' : 
    $lesContinents=Continent::findAll();
    include('vues/listeContinents.php');
    break;
    case 'add' :
        $mode="Ajouter";
        include('vues/formNationalite.php');
    break;
    case 'update' :
        $mode="Modifier";
        $nationalite=Nationalite::findById($_GET['num']);
        include('vues/formNationalite.php');
    break;
    case 'delete' : 
        $nationalite=Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($nationalite);
        if($nb==1){
            $_SESSION['message']=["success"=>"Le nationalite a bien été supprimé"];       
        }else{
            $_SESSION['message']=["success"=>"Le nationalite n'a pas été supprimé"];
        }
        header('location: index.php?uc=nationalites&action=list');
            exit();
    break;

    case 'valideForm' : 
        $nationalite= new Nationalite();
        if(empty($_POST['num'])) {// cas d'une création
            $nationalite->setLibelle($_POST['libelle']);
            $nb=Nationalite::add($nationalite);
            $message = "ajouté";
        }else{ // cas d'une modif
            $continent->setNum($_POST['libelle']);
            $continent->setLibelle($_POST['libelle']);
            $nb=Continent::update($continent);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"Le nationalite a bien été $message"];       
        }else{
            $_SESSION['message']=["success"=>"Le nationalite a bien été $message"];
        }
        header('location: index.php?uc=nationalites&action=list');
    exit();
    break;
}