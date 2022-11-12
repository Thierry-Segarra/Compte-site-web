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
    include('Fonction_PHP_JS/connect.php');
    if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
        $requete = "SELECT * FROM utilisateur order by nom_utilisateur ";
        $exec_requete = mysqli_query($db,$requete);
            ?>
            <a href="acceuil.php" class="dec">Acceuil</a>
            <br><br><br>
            <div class='admin_div'>
                <table>
                    <tr>
                        <th>pseudo</th><th>bannir</th><th>suprimer compte</th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_assoc($exec_requete)){
                            ?>
                            <tr>
                                <?php 
                                if($row['etat'] == "Bannir"){
                                    $etat = "Debannir";
                                }else{
                                    $etat = "Bannir";
                                }
                                ?>
                                <td><?php echo $row['nom_utilisateur'] ?></td>
                                <td><button><a href="Fonction_PHP_JS/bannir.php?<?php echo $etat ?>=<?php echo $row['id_user'] ?>"><?php echo $etat ?></a></button></td>
                                <td><button><a href="Fonction_PHP_JS/supprimer_compte.php?sup=<?php echo $row['id_user'] ?>">Supprimer</a></button></td>
                            </tr>
                            <?php
                        }
                    ?>

                </table>
            </div>
            <?php
    }
    else{
        header('Location: index.php');
    }
    ?>
</body>
</html>
