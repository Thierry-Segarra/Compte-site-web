<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
    <body class="bodd">
    <?php
    session_start();
    if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
        $nom = $_SESSION['username'];
            echo '<p class="titre">Hello '. $nom .'</p>';
            ?>
            <a href="parametre_compte.php" class="dec">Paramètre Compte</a>
            <br><br><br>
            <a href="index.php?dec=1" class="dec">Déconnexion</a>
            <br><br><br>
            <a href="Fonction_PHP_JS/supprimer_compte.php?sup=<?php echo $_SESSION['id_user']?>" class="dec">Suprimé Compte</a>;
            <br><br><br>
            
            
            <?php
            if($_SESSION['role'] == "admin"){
                ?>
                <a href="Fonction_PHP_JS/admin.php?no" class="dec">Plus Etre admin</a>
                <br><br><br>
                <a href="Bannir_user.php" class="dec">Bannir</a>
                <?php
            }else{
                ?>
                <a href="Fonction_PHP_JS/admin.php?yes" class="dec">Etre admin</a>
                <?php
            }
    }
    else{
        header('Location: index.php');
    }
    ?>
</body>
</html>
