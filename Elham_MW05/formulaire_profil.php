<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>BTS SNIR - Dev WEB</title>
        <link rel="stylesheet" type="text/css" href="./CSS/formulaire.css">
    </head>

    <body>
        <h1>Modifiez votre profil!</h1>
        <form id="form_modification" action="rest.php" method="post">
        
            <label for="nom">Nom: </label>
            <input type="text" id="nom" name="nom_utilisateur">

            <label for="prenom">Prénom: </label> 
            <input type="text" id="prenom" name="prenom_utilisateur">
            
            <label for="adresse_mail">Adresse mail: </label>
            <input type="email" id="adresse_mail" name="adresse_mail_utilisateur">

            <label for="pseudo">Pseudo: </label>
            <input type="text" id="pseudo" name="pseudo_utilisateur">

            <button id="bouton_connexion" class="fond_bleu police_blanche" type="submit" name="miseajour">Mettre à jour</button>
            <br>
            <button id="" bg-color="grey">Retourner vers la page d'acceuil</button>



        </form>
        
         
 <?php

//setcookie("pseudo",$_GET['login'],time()+360);
    if(isset($_GET['erreur']))
    {
        // echo $_GET['erreur'];
        echo "Le pseudo n'est pas associé à un compte";
    }
    if(isset($_GET['login'])) {
        setcookie("pseudo",$_GET['login'],time()+3600,"/");
        header("Location:index.php?update=success");
    }
    
?>
</body>
</html>
