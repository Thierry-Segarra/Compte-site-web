<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div id="container">            
            <form action="verif.php" method="POST">
                <h1>Connectez-vous</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value="S'IDENTIFIER" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2){
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:green'>Connecter-vous</p>";
                    }

                }
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
                if(isset($_GET['sup'])){
                    echo "<p style='color:red'>Compte Suprimée</p>";
                }
                ?>
                <p class="Inscriptiontext">Si vous n'avez pas de Compte</p>
                <a class="s" href="inscription.php" >Incrivez-vous</a>
                
            </form>
        </div>
    </body>
</html>