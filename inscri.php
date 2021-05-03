<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['passwordConf']))
{
    // connexion à la base de données
    include('connect.php');
    
    // on applique les troi fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    $passwordConf = mysqli_real_escape_string($db,htmlspecialchars($_POST['passwordConf']));
    
    if($username !== "" && $password !== "" && $passwordConf !== "")
    {
        if(strcmp($password,$passwordConf) == 0){

            // une requeste SQL pour savoire si le nom de l'utilisateur n'est pas deja utiliser
            // si oui mettre un message erreur "nom d'utilisateur deja utiliser"

            //verifier si l'email et deja utiliser
            // si oui mettre un message erreur "email deja utiliser"

            // requeste SQL inscert du nouveau compte A.G.O et l'envoyer sur la parge Login pour se connecter

            // changer cette requete SQL , elle est la pour exemple
            $requete = "SELECT count(nom_utilisateur) FROM utilisateur where nom_utilisateur = '".$username."'";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(nom_utilisateur)']; // si 0 = non utiliser si 1 = utiliser

            if($count==0) // !=0 si le nom_utilisateur et deja utiliser | == 0 si le nom_utilisateur n'est pas utiliser
            {   
                $conf = $username;
                $pwd_peppered = hash_hmac("md5", $password, $conf);

                $requete = "INSERT INTO `utilisateur`(`nom_utilisateur`, `mot_de_passe`) VALUES ('".$username."','".$pwd_peppered."')"; // id auto-increase
                $requete = mysqli_query($db,$requete) or die("Foobar");// doit normalement executer la requete SQL
                if($requete){
                    header('Location: index.php?erreur=3');
                }
                else
                {
                    header('Location: inscription.php?erreur=3');
                }
            }
            else
            {
                header('Location: inscription.php?erreur=1');// nom d'utilisateur et deja inscrit
            }
        }
        else
        {
            header('Location: inscription.php?erreur=2'); // mot de passe incorrencte
        }
    }
    else
    {
       header('Location: inscription.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: inscription.php');
}
mysqli_close($db); // fermer la connexion
?>