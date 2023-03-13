<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>BTS SNIR - Dev WEB</title>
        <link rel="stylesheet" type="text/css" href="./CSS/formulaire.css">
    </head>

    <body id="body" data-theme="dark">
        <h1>Inscrivez-vous !</h1>
        <form id="form_inscription" method="post" action="rest.php">
            <label for="nom">Nom : </label>
            <input type="text" id="nom" name="nom_utilisateur" required>

            <label for="prenom">Prénom : </label> 
            <input type="text" id="prenom" name="prenom_utilisateur" required>
            
            <label for="adresse_mail">Adresse mail: </label>
            <input type="email" id="adresse_mail" name="adresse_mail_utilisateur" required>
            
            <label for="naissance">Date de naissance: </label>
            <input type="date" id="naissance" name="naissance_utilisateur" required>
                            
            <label for="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" name="pseudo_utilisateur" required>

            <label for="mdp1">Mot de passe : </label>
            <input type="password" id="mdp1" name="mdp1_utilisateur" required>
            
            <p>
                <span class="rouge" id="mdp_longueur">8 caractères </span>avec au moins: 
                <span class="rouge" id="mdp_majuscule">1 majuscule</span>
                <span class="rouge" id="mdp_minuscule">1 minuscule</span>
                <span class="rouge" id="mdp_chiffre">1 chiffre</span>
                <span class="rouge" id="mdp_special">1 caractère spécial</span>.
            
            </p>
            
            <label for="mdp2">Ressaisir le mot de passe : </label>
            <input type="password" id="mdp2" name="mdp2_utilisateur">
            <button id="bouton_inscription" class="fond_bleu police_blanche" type="submit" name="inscription">M'inscrire !</button>
            
            <?php
                if(isset($_GET['erreur']))
                {
                   // echo $_GET['erreur'];
                    echo 'Le pseudo est existe déjà. Veuillez saisir un autre';

                }
                if(isset($_GET['login'])) {
                    setcookie("pseudo",$_GET['login'],time()+3600);
                }
                
            ?>
            
        </form>
        <!-- <button id="dark_light" type="button">Mode Sombre</button> -->

        <script src="JS/formulaire.js"></script>

    </body>
</html>