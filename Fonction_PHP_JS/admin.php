<?php
session_start();
include('connect.php');

if(isset($_GET['yes'])){
    $requete = "UPDATE `utilisateur` SET `role`='admin' WHERE nom_utilisateur = '".$_SESSION['username']."'";
    $requete = mysqli_query($db,$requete) or die("Foobar");// doit normalement executer la requete SQL
    if($requete){
        $_SESSION['role'] = "admin";
        header('Location: ../acceuil.php?erreur=3');
    }
}else if(isset($_GET['no'])){
    $requete = "UPDATE `utilisateur` SET `role`='null' WHERE nom_utilisateur = '".$_SESSION['username']."'";
    $requete = mysqli_query($db,$requete) or die("Foobar");// doit normalement executer la requete SQL
    if($requete){
        $_SESSION['role'] = "null";
        header('Location: ../acceuil.php?erreur=3');
    }
}
?>