<?php
/*RECUPERER les donnees du formulaire*/
$mydb = new PDO('mysql:host=localhost;dbname=drone_elham;charset=utf8','emodasser','modasser');
 //echo "<pre>"; print_r($_POST); echo "</pre>";
 foreach($_POST as $c => $v)
        $$c=$v;
if(isset($_POST["inscription"])){
        
        if(isset($res>0))
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
        }
        else
        {
                echo "L'utilisateur existe déjà;"
        }
}

else if(isset($_POST["connexion"])){       
        $req = "SELECT nom, prenom FROM utilisateur WHERE pseudo=? AND mdp=?";
        $reqpreparer=$mydb->prepare($req);
        $tableauDeDonnees=array($pseudo_utilisateur,
                                $mdp_utilisateur);
        
        $reqpreparer->execute($tableauDeDonnees);
        $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>"; print_r($reponse); echo "</pre>";     
        $reqpreparer->closeCursor();

}

if(empty($reponse))
{
        echo 'Veuillez saisir le pseudo et le mdp associés à un compte.';
}
?>