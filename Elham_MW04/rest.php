<?php
/*RECUPERER les donnees du formulaire*/
$mydb = new PDO('mysql:host=localhost;dbname=drone_elham;charset=utf8','emodasser','modasser');
print_r($_POST);

//pour le formulaire d'inscription
if(isset($_POST["mdp1_utilisateur"]))
{
  $req = "INSERT INTO utilisateur (nom, prenom, email, naissance, pseudo, mdp) VALUES (?,?,?,?,?,?)";
  $tableauDeDonees=array ($_POST["nom_utilisateur"], $_POST["prenom_utilisateur"], $_POST["mail_utilisateur"], $_POST["date_de_naissance_utilisateur"], $_POST["pseudo_utilisateur"], $_POST["mdp1_utilisateur"]);
  $reqpreparer=$mydb->prepare($req);
  $reqpreparer->execute($tableauDeDonees);
  $reqpreparer->closeCursor();

}

//Pour le formulaire de connexion
else if(isset($_POST["mdp_utilisateur"]))
{
  $req = "SELECT nom, prenom FROM utilisateur WHERE pseudo=? AND mdp=?";
  $tableauDeDonees=array ($_POST["pseudo_utilisateur"], $_POST["mdp_utilisateur"]);
  $reqpreparer=$mydb->prepare($req);
  $reqpreparer->execute($tableauDeDonees);
  $reponse = $reqpreparer->fetchAll(PDO::FETCH_ASSOC);
  print_r($reponse);
  $reqpreparer->closeCursor();}
  if (empty($reponse)) {
  echo 'reponse vide';
}


/*INSERER un nouvel utilisateur dans la base de donnees*/

        // $mydb = new PDO('mysql:host=localhost;dbname=drone_elham;charset=utf8','emodasser','modasser');
        // $req = "INSERT INTO utilisateur (nom, prenom, email, naissance, pseudo, mdp) VALUES (?,?,?,?,?,?)";
        // $reqpreparer=$mydb->prepare($req);
        // $tableauDeDonnees=array('Sarron','Christian','sarron.christian@protonmail.com','1970-01-12','login11','mdp11');
        // $reqpreparer->execute($tableauDeDonnees);
        // $reqpreparer->closeCursor();

/*RECUPERER les informations des utilisateurs dans la base de donnees*/

        // $mydb = new PDO('mysql:host=localhost;dbname=drone_elham;charset=utf8','emodasser','modasser');
        // $req = "SELECT nom,prenom FROM utilisateur";
        // $reqpreparer=$mydb->prepare($req);
        // $tableauDeDonnees=array();
        // $reqpreparer->execute($tableauDeDonnees);
        // $response=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
        // print_r($response);
        // $reqpreparer->closeCursor();



?>