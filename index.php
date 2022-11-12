




<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
    <body class="bodd">
    <br><br><br>
    <a href="connection.php" class="dec">Connection</a>
    <br><br><br>
    <a href="inscription.php" class="dec">Inscription</a>
    <?php
    if(isset($_GET['dec'])){
        $dec = $_GET['dec'];
        if($dec==1){
            session_start();
            $_SESSION['id'] = "";
            $_SESSION['username'] = "";
            $_SESSION = array();
            
            session_destroy(); 
            echo "<p style='color:green'>Vous etez deconnecter</p>";
        }
    }
    ?>
</body>
</html>
