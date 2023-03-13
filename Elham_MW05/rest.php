<?php
/*RECUPERER les donnees du formulaire*/
$mydb = new PDO('mysql:host=localhost;dbname=drone_elham;charset=utf8','emodasser','modasser');
 //echo "<pre>"; print_r($_POST); echo "</pre>";
 foreach($_POST as $c => $v)
        $$c=$v;
if(isset($_POST["inscription"])){
        $req = "SELECT nom, prenom FROM utilisateur WHERE pseudo=?";
        $reqpreparer=$mydb->prepare($req);
        $tableauDeDonnees=array($pseudo_utilisateur);                              
        $reqpreparer->execute($tableauDeDonnees);
        $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
      
        if(count($reponse)==0)
              {
                $req = "INSERT INTO utilisateur(nom, prenom, email, naissance, pseudo, mdp) VALUES(?,?,?,?,?,?)";
                $reqpreparer=$mydb->prepare($req);
                $tableauDeDonnees=array($nom_utilisateur,
                                        $prenom_utilisateur,
                                        $adresse_mail_utilisateur,
                                        $naissance_utilisateur,
                                        $pseudo_utilisateur,
                                        $mdp1_utilisateur);

                $reqpreparer->execute($tableauDeDonnees);
                $reqpreparer->closeCursor();

                //header("Location:formulaire_connexion.php?login=");
                // echo "Veuillez saisir le pseudo et le mdp que vous venez de créer";
              }
        
        else
        {
                // echo "L'utilisateur existe déjà";
                header('Location:formulaire_inscription.php?erreur=pseudo');
        }

}

//=================CONNEXION==================

else if(isset($_POST["connexion"]))
{       
        $req = "SELECT nom, prenom FROM utilisateur WHERE pseudo=? AND mdp=?";
        $reqpreparer=$mydb->prepare($req);
        $tableauDeDonnees=array($pseudo_utilisateur,
                                $mdp_utilisateur);
        
        $reqpreparer->execute($tableauDeDonnees);
        $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>"; print_r($reponse); echo "</pre>";     
        $reqpreparer->closeCursor();

        if(empty($reponse))
        {
                // echo 'Veuillez saisir le pseudo et le mdp associés à un compte.';
                header('Location:formulaire_connexion.php?erreur=pseudo');
        }
        else {
                header("Location:formulaire_connexion.php?login=$pseudo_utilisateur");
                //header("Location:index.php?login=$pseudo_utilisateur");
        }
}
//=============SUPPRESSION DE COOKIE===================

// if (isset($_GET['deconnexion'])) {
//         $cookies = explode(';', $_GET['deconnexion']);
//         foreach($cookies as $cookie) {
//             $parts = explode('=', $cookie);
//             $pseudo_utilisateur = trim($parts[0]);
//             setcookie('pseudo', '', time()-1000);
//             setcookie('pseudo', '', time()-1000, '/');
//         }
//     }

if(isset($_GET['deconnexion']))
    {
        foreach($_COOKIE as $c => $v)
        {
                setcookie("pseudo","",time()-1,"/");
                header('Location:index.php?login=deconnexion');
        }
    }



//=====================MODIFICATION=======================
if(isset($_POST["miseajour"])){

                $req = "SELECT nom, prenom, mail, pseudo FROM utilisateur WHERE pseudo=?";

                $reqpreparer=$mydb->prepare($req);
                $tableauDeDonnees=array($pseudo_utilisateur);                              
                $reqpreparer->execute($tableauDeDonnees);
                $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);

                if(count($reponse)==0)
                {
                        $req = "UPDATE utilisateur SET nom, prenom, email, pseudo WHERE pseudo=?";
                        $reqpreparer=$mydb->prepare($req);
                        $tableauDeDonnees=array($nom_utilisateur,
                                                $prenom_utilisateur,
                                                $adresse_mail_utilisateur,
                                                $pseudo_utilisateur);

                        $reqpreparer->execute($tableauDeDonnees);
                        $reqpreparer->closeCursor();
                
                header('Location:formulaire_profil.php?nom=....&prenom=....&email=....&pseudo=....');
                }
                 
                else
                {
                          // echo "L'utilisateur existe déjà";
                          header('Location:formulaire_inscription.php?erreur=pseudo');
                }
}
        ?>