<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
    <body>
        <div id="container">            
            <form action="Fonction_PHP_JS/inscription_form.php" method="POST">
                <h1>Inscription</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" maxlength="13" required>

                <label><b>Choisissez un Mot de passe</b></label><abbr class="information" title="Doit comporté au minimum une minuscule, majuscule, numero, caractère spèciale et 12 caractère">?</abbr>
                <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{12,}$" required>
                <div class="verification">
                    <span id="verif1" class="invalide">1</span>
                    <span id="verif2" class="invalide">2</span>
                    <span id="verif3" class="invalide">3</span>
                    <span id="verif4" class="invalide">4</span>
                    <span id="verif5" class="invalide">5</span>
                </div>
                <br>
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
                
                <a class="s" href = "connection.php">S'identifier</a>
                
            </form>
            <script>
                const input = document.getElementById("password");
                const log = document.getElementById('values');

                input.addEventListener('input', updateValue);

                function updateValue(e) {
                    var verif_nb = 0;
                    console.log(e.target.value);
                    var verification = e.target.value

                    var lowerCaseLetters = /[a-z]/g;
                    var upperCaseLetters = /[A-Z]/g;
                    var numbers = /[0-9]/g;
                    var special = /[!@#$%^&*_=+-]/g;

                    if(verification.match(lowerCaseLetters)) {
                        verif_nb++;
                    }
                    if(verification.match(upperCaseLetters)) {
                        verif_nb++;
                    }
                    if(verification.match(numbers)) {
                        verif_nb++;
                    }
                    if(verification.match(special)) {
                        verif_nb++;
                    }
                    if(verification.length >= 12) {
                        verif_nb++;
                    }
                    for (let index = 1; index <= 5; index++) {
                        document.getElementById("verif"+index).className="invalide";
                    }
                    for (let index = 1; index <= verif_nb; index++) {
                        document.getElementById("verif"+index).className="valide";
                    }
                }
                
            </script>
        </div>
    </body>
</html>