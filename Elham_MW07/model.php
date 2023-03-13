 <?php
/****** Connexion au serveur de BdD *******/
function ConnectDB() {
	$id = new PDO('mysql:host=localhost;dbname=drone_elham;charset=utf8', 'emodasser', 'modasser');
	return $id; //si il y a "return" il envoie quelque chose...dans notre cas c'est l'objet
}

function executerRequete($id,$req,$tableauDeDonnees){
	$res=preparerRequete($id,$req);
	$res=executerRequetePrepare($res,$tableauDeDonnees);
	return extraireDonneesRequetePrepare($res);

}

function preparerRequete($id,$req){ //envoie de la requete
	$res=$id->prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	return $res;
}

function executerRequetePrepare($res,$tableauDeDonnees){ // execution de la requete
	$res->execute($tableauDeDonnees);
  return $res;
}

function extraireDonneesRequetePrepare($res){ //recuperation des données demandé
	  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function recupererLeDernierIdInserer($id){	//recupérer le dernier id
	  return $id->lastInsertId();
}

function fermerCursor($res){	//fermer la requete
	$res->closeCursor();
}

function executerRequeteCurl($donnees,$method){		//executer la requete et se rediriger vers la navigateur web
  $url='rest.php';
  $url.=$donnees;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL,$url );
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));

  $tabListMission=curl_exec($curl);curl_error($curl);
	curl_close($curl);
  $ListMissionJSON=json_decode($tabListMission,true);

  return $ListMissionJSON;
}


?>
