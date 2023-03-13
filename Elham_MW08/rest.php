<?php
include 'model.php';

$maConnexionBDD = ConnectDB();

//echo "connexion réussie";

// Préparation de la requete

/*$requete = "INSERT INTO utilisateur(nom,prenom) VALUES(?,?)";
$requete_preparee = preparerRequete($maConnexionBDD, $requete);

// Création du tableau contenant les valeurs à insérer dans la requete

$tab = array("test","methode");

//éxecution de la requete préparée avec des valeurs du tableau $tab
executerRequetePrepare($requete_preparee, $tab);
*/


/*
$requete = "SELECT * FROM utilisateur";
$requete_preparee = preparerRequete($maConnexionBDD, $requete);

// Création du tableau contenant les valeurs à insérer dans la requete

$tab = array();

//éxecution de la requete préparée avec des valeurs du tableau $tab
$reponse = executerRequetePrepare($requete_preparee, $tab);
$result = extraireDonneesRequetePrepare($reponse);

echo "<pre>";print_r($result);echo "</pre>";
*/


//$requete = "SELECT * FROM utilisateur";
$req_type=$_SERVER['REQUEST_METHOD'];
$req_path=$_SERVER['PATH_INFO'];

$req_data=explode('/',$req_path);

if($req_type=="GET")
{
  //echo "<pre>";
  //echo "La méthode est get"; //Ici requêtes de sélections : SELECT
  //echo "</pre>";

  /*if($req_data[1]=="vol")
  {
    echo "vol ";

    if(isset($req_data[2])){
      echo ($req_data[2]);
      }
  }

  if($req_data[1]=="utilisateur")
  {
    echo "utilisateur ";

    if(isset($req_data[2])){
      echo ($req_data[2]);
      }
  }*/

  if($req_data[1]=="suivi")
  {
//    echo '{"nbdrone":"4","nbvol":"56","nbutilisateur":"10"}';

  //drone

  $req = "SELECT COUNT(iddrone) AS nbdrone FROM drone ";
  $rep = executerRequete($maConnexionBDD,$req,array());
  $nbdrone = $rep[0]['nbdrone'];

  //VOL
  $req = "SELECT COUNT(idvol) AS nbvol FROM vol ";
  $rep = executerRequete($maConnexionBDD,$req,array());
  $nbvol = $rep[0]['nbvol'];

  //utilisateur
  $req = "SELECT COUNT(idutilisateur) AS nbutilisateur FROM utilisateur ";
  $rep = executerRequete($maConnexionBDD,$req,array());
  $nbutilisateur = $rep[0]['nbutilisateur'];

  //Resultat en tableau
  $ResEnTab = array("nbdrone" => $nbdrone, "nbvol" => $nbvol, "nbutilisateur" => $nbutilisateur);
  $ResEnJson = json_encode($ResEnTab);
  echo $ResEnJson;



}

  if($req_data[1]=="drone")
  {

    $reqDrone = "SELECT * FROM drone";
    $repDrone = executerRequete($maConnexionBDD,$reqDrone,array());
    $ResDroneEnJsonTab = json_encode($repDrone);
    echo $ResDroneEnJsonTab;

  }

  if($req_data[1]=="vol")
  {

    $reqVol = "SELECT idvol, dateVol, iddrone, nom FROM vol INNER JOIN utilisateur ON vol.idutilisateur=utilisateur.idutilisateur";
    $repVol = executerRequete($maConnexionBDD,$reqVol,array());
    $ResVolEnJsonTab = json_encode($repVol);
    echo $ResVolEnJsonTab;

  }

  if($req_data[1]=="utilisateur")
  {

    $reqUser = "SELECT idutilisateur, nom, prenom, email, naissance, pseudo FROM utilisateur WHERE true";
    $repUser = executerRequete($maConnexionBDD,$reqUser,array());
    $ResUserEnJsonTab = json_encode($repUser);
    echo $ResUserEnJsonTab;

  }

  if(isset($req_data[1]))
  {
    if($req_data[1]=="etat")
    {
      $reqEtat = "SELECT $req_data[3] FROM etat WHERE idvol=?";
      $repEtat = executerRequete($maConnexionBDD, $reqEtat, array());
      $ResEtat = json_encode($repEtat);

      echo $ResEtat;
    }
  }

  if($req_data[1]=="graphe_test")
    {
    $reqGraphe = "SELECT idetat,$req_data[2] FROM etat WHERE idvol=?";
    $repGraphe = executerRequete($maConnexionBDD, $reqGraphe, array(3));
    $resGraphe = json_encode($repGraphe);

    echo $resGraphe;
    /*    echo
      '[{
        "idetat": "Lithuania",
        "bat": 501

      }]';*/
  }
}


else if($req_type=="POST")
{

//  echo "La méthode est post"; //Ici requêtes d'insersion : INSERT


  if($req_data[1]=="vol")
  {
    //echo "vol ";

    if(isset($req_data[2])){
      echo ($req_data[2]);
    }

//Récupération du fichier JSON dans la variable $donneesVolJSON
    $donneesVolJSON = file_get_contents("etat.json");

//Convertir du JSON en un tableau associative
    $donneesVolAssoc=json_decode($donneesVolJSON,true);
//Affichage du tableau associative
    print_r($donneesVolAssoc);

//Affichage l'état de la batterie (pour tester)
echo "Nom : ".$donneesVolAssoc["donneesVol"]["nom"]."\n";
echo "ETAT DE LA BATTERIE: ".$donneesVolAssoc["donneesVol"]["etats"]["0"]["bat"]."\n";

//==============Affichage de l'id du nom======================
$requete = "SELECT idutilisateur FROM utilisateur WHERE nom=?";
$requete_preparee = preparerRequete($maConnexionBDD, $requete);

$tab = array($donneesVolAssoc["donneesVol"]["nom"]);

$id = executerRequetePrepare($requete_preparee,$tab);
$result = extraireDonneesRequetePrepare($id);
if(!empty($result)){
  $idutilisateur = $result[0]["idutilisateur"];
  echo "id utilisateur: ".$result[0]["idutilisateur"]."\n";
}
//=============insertion de l'utilisateur===========
else {
  $requete3 = "INSERT INTO utilisateur(nom) VALUES(?)";
  $requete3_preparee = preparerRequete($maConnexionBDD, $requete3);
  $reponse3 = executerRequetePrepare($requete3_preparee, $tab);
  print_r($reponse3);
}
//==================================================

//====================ID DRONE======================
$requete2 = "SELECT iddrone FROM drone WHERE refDrone=?";
$requete2_preparee = preparerRequete($maConnexionBDD, $requete2);

$tab2 = array($donneesVolAssoc["donneesVol"]["numero"]);

$reponse2 = executerRequetePrepare($requete2_preparee,$tab2);
$result2 = extraireDonneesRequetePrepare($reponse2);

$iddrone = $result2[0]["iddrone"];
echo "id drone: ".$result2[0]["iddrone"]."\n";
//==================================================


//===========SELECTIONNER VOL=============
$requete4="SELECT idvol FROM vol WHERE dateVol=? AND idutilisateur=? AND iddrone=?";
$requete4_preparee = preparerRequete($maConnexionBDD, $requete4);

$time = $donneesVolAssoc["donneesVol"]["time"];
$date = date('Y-m-d H:i:s',$time);
$tab4 = array($date,$idutilisateur,$iddrone);

$rep4 = executerRequetePrepare($requete4_preparee,$tab4);
$res4 = extraireDonneesRequetePrepare($rep4);

//print_r($res4);

if(!empty($res4))
{
  print_r($res4);
}

//======INSERTION D'UN NOUVEAU VOL======

else{
  $req5 = "INSERT INTO vol(dateVol, idutilisateur, iddrone) VALUES(?,?,?)";

  $req5_prep = preparerRequete($maConnexionBDD,$req5);
  $rep5 = executerRequetePrepare($req5_prep,$tab4);

  $idvol = recupererLeDernierIdInserer($maConnexionBDD);

  echo "vol: ".$idvol."\n";

}

//=======================================

//==============ETAT DU VOL==============
$reqEtat= "SELECT * FROM etat";
$reqEtat_preparee = preparerRequete($maConnexionBDD, $reqEtat);

$tabEtat = array($donneesVolAssoc["donneesVol"]["etats"][0]);

$reqEtat = executerRequetePrepare($reqEtat_preparee,$tabEtat);
$resEtat = extraireDonneesRequetePrepare($reqEtat);


if(!empty($resEtat))
{
  $req_etat = "INSERT INTO etat(idvol,pitch,roll,yaw,vgx,vgy,vgz,templ,temphn,tof,h,bat,baro,time,agx,agy,agz) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  $req_etat_prep = preparerRequete($maConnexionBDD, $req_etat);
  $req_etat = executerRequetePrepare($req_etat_prep, $tabEtat);
  $res_etat = extraireDonneesRequetePrepare($req_etat);

}

else {

    print_r("error");

}


//$etatvol = recupererLeDernierIdInserer($maConnexionBDD);




} //  if(vol) de POST

  if($req_data[1]=="utilisateur")
  {
    echo "utilisateur ";

    if(isset($req_data[2])){
      echo ($req_data[2]);
    }
  }
} //else if(POST)





//$etatsVols=$donneesVolAssoc['donneesVol']['numero']['etat']


/*for($i = 0; $i<count($etatsVols); $i++)
{
  echo $donneesEtatsVols=$etatsVols[$i];
}*/




 ?>
