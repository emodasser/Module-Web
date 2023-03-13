<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>BTS SNIR - Dev WEB</title>
        <link rel="stylesheet" type="text/css" href="./CSS/formulaire.css">
    </head>

    <body>
        <h1>Identifiez-vous !</h1>
        <form id="form_connexion" action="rest.php" method="post">
        
            <label for="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" name="pseudo_utilisateur">
            <label for="mdp">Mot de passe : </label>
            <input type="password" id="mdp" name="mdp_utilisateur">
            <button id="bouton_connexion" class="fond_bleu police_blanche" type="submit" name="connexion">Valider</button>



        </form>
        
            
        <p>Vous n'avez pas d'identifiant ? Remplissez alors notre formulaire d'inscription.</p>
        <?php

//setcookie("pseudo",$_GET['login'],time()+360);
    if(isset($_GET['erreur']))
    {
        // echo $_GET['erreur'];
        echo "Le pseudo n'est pas associé à un compte";
    }

//===============CREATION DU COOKIE=============
    if(isset($_GET['login'])) {
        setcookie("pseudo",$_GET['login'],time()+3600,"/");
        header("Location:index.php?login=success");
    }
    
?>
    </body>
</html>
