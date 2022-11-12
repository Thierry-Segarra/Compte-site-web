<?php
session_start();
include('connect.php');
if($_GET['sup']){
    $username = $_GET['sup'];
    $requete = "DELETE FROM `utilisateur` WHERE id_user = '".$username."' ";
    $exec_requete = mysqli_query($db,$requete);
    $reponse      = mysqli_fetch_array($exec_requete);
    header('Location: ../bannir_user.php');
}
?>