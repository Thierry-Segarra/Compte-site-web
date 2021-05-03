<?php
session_start();
include('connect.php');
$username = $_SESSION['username'];
$requete = "DELETE FROM `utilisateur` WHERE nom_utilisateur = '".$username."' ";
$exec_requete = mysqli_query($db,$requete);
$reponse      = mysqli_fetch_array($exec_requete);
header('Location: index.php?sup=1');
?>