<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div id="container">            
            <form action="inscri.php" method="POST">
                <h1>Inscription</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" maxlength="13" required>

                <label><b>Choisissez un Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <label><b>Confirmez le Mot de passe</b></label>
                <input type="password" placeholder="Confirmer le mot de passe" name="passwordConf" required>


                <input type="submit" id='submit' value="INSCRIPTION" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Nom d'utilisateur deja inscrit</p>";
                    }
                    if($err==2){
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:red'>Echec d'inscription</p>";
                    }
                }
                ?>
                <p class="Inscriptiontext">Déjà un compte</p>
                
                <a class="s" href = "index.php">S'identifier</a>
                
            </form>
        </div>
    </body>
</html>