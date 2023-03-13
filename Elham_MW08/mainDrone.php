<?php

  include "model.php";
//  include "rest.php";

  $donnees="/suivi";
//  $option=array(CURLOPT_HTTPGET=>true);
  $reponseAPITab=executerRequeteCurl($donnees,"GET");
// $reponseAPITab=json_decode($reponseAPIJson,true);


  echo '<div class="statistique"><a href="?drone">
            <p class="statistique_icone"><img src="./icones/drone.svg"></p>
            <p class="statistique_valeur">'.$reponseAPITab['nbdrone'].'</p></a></div>';
  echo '<div class="statistique"><a href="?vol">
            <p class="statistique_icone"><img src="./icones/fly.svg"></p>
            <p class="statistique_valeur">'.$reponseAPITab['nbvol'].'</p></a></div>';
  if(!isset($_COOKIE['pseudo'])){
    echo '<div class="statistique"><a href="?utilisateur">
              <p class="statistique_icone"><img src="./icones/man.svg"></p>
              <p class="statistique_valeur">'.$reponseAPITab['nbutilisateur'].'</p></a></div>';
  }

?>
