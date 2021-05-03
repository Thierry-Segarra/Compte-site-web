<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    include('connect.php');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
      $conf = $username; // change pour chaque nom_utilisateur
      $pwd_peppered = hash_hmac("md5", $password, $conf);

      $requete = "SELECT count(*) FROM utilisateur where 
         nom_utilisateur = '".$username."' and mot_de_passe = '".$pwd_peppered."' ";
      $exec_requete = mysqli_query($db,$requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      if($count!=0) // nom d'utilisateur et mot de passe correctes
      {   
         $_SESSION['username'] = $username;
            header('Location: acceuil.php');
      }
      else
      {
         header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }

      
    }
    else
    {
       header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php');
}
mysqli_close($db); // fermer la connexion
?>