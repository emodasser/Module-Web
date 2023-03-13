<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <title>BTS SNIR - Dev WEB</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./CSS/ossature_grid.css">
    <link rel="stylesheet" type="text/css" href="./CSS/design.css">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">


  </head>

  <body>
    <header>

      <h1>Dron'ir</h1>
      <img id="dark_light">
      <img id="hamburger" src="MyHamburger.png">
    </header>

    <nav id="barre_navigation">
        <a href="index.php" id="nav_presentation">Présentation</a>
        <a href="?suivi">Suivi</a>
  		<?php if(isset($_COOKIE['pseudo'])) {
  	 			     echo "<a href='?profil' id='nav_connexion'>Profil</a>";
  				     echo "<a href='?deconnexion' id='nav_connexion'>Deconnexion</a>";
    			}else{
  	 			     echo '<a  id="nav_connexion" href="">Connexion</a>';
    				 echo '<a  id="nav_inscription" href="">Inscription</a>';
  			}
  		?>
      <div></div>
    </nav>
  <section>
	<?php


    if(isset($_GET['suivi'])){
    	include('mainDrone.php');
    }
    else if(isset($_GET['drone'])){
    	include('aircraftDrone.php');
    }
    else if(isset($_GET['vol'])){
    	include('flyDrone.php');
    }
    else if(isset($_GET['utilisateur'])){
    	include('userDrone.php');
    }
    else if(isset($_GET['AfficherGrapheVol'])){
    	include('graphe.php');
    }

    else {
      echo '<main>
        <h2>Le drone TELLO</h2>
        <div class="deux_colonnes">
          <img id="imgdronetello" src="DroneTelloSiteOfficiel.jpg"></img>
          <div class="colonne_texte">
            <p>Que vous soyez dans un parc, au bureau ou à la maison, vous pouvez décoller à tout moment et découvrir le monde avec un œil nouveau. Tello est doté de deux antennes qui permettent une transmission vidéo parfaitement stable et d’une batterie de grande capacité pour des durées de vol impressionnantes.</p>
            <div class="quatre_colonnes">
              <p>Temps de vol<br/><span class="evidence">13 min</span></p>
              <p>Distance de vol<br/><span class="evidence">100 m</span></p>
              <p>Caméra<br/><span class="evidence">720P</span></p>
              <p>Transmission<br/><span class="evidence">2 antennes</span></p>
            </div>
          </div>
        </div>
        <h2>Le Mavic Air</h2>
        <p>A compléter</p>
<!--        <img id="imgdronemavic" src="DroneTelloFondOrangeRedecoupe.jpg"></img>
        <p>On pourrait demander aux étudiants de présenter les 2 familles de drônes que nous utilisons au lycée, en mode reportage, avec des liens vers les documentations, une galerie de photo et même des liens vers les vidéos offcielles de ces drones ;)</p>
-->
      </main>';
    }
	?>
  </section>
	<aside id="ma_aside">
    <p>Début du stage dans :</p>
      <div id="nb_jours" class="compteur">115J</div>
      <div id="nb_heures" class="compteur">12H</div>
      <div id="nb_minutes" class="compteur">45M</div>
      <div id="nb_secondes" class="compteur">12S</div>
		<p>Mes sites de développement</p>
		<ul>
			<li><a href="">w3schools</a></li>
			<li><a href="">developer.mozilla.org</a></li>
			<li><a href="">openclassroom</a></li>
			<li><a href="">alsacréation</a></li>
		</ul>
	</aside>
  <footer id="mon_footer">
    <div>
        <h1>Les drones :</h1>
        <a href="https://www.ryzerobotics.com/fr/tello">Le drone Tello</a>
        <a href="https://www.dji.com/fr/mavic">Le Mavic Pro</a>
      </div>
      <div>
        <h1>Les règles de vol :</h1>
        <a href="https://www.service-public.fr/particuliers/vosdroits/F34630">Le site officiel du service public</a>
      </div>
      <div>
        <h1>A propos :</h1>
        <a href="../00_LeCV/index.html" alt="Mon CV">Consulter mon CV</a>
        <a href="https://css-tricks.com/snippets/css/complete-guide-grid/">Tout sur les Grid CSS</a>
      </div>
    </footer>

    <script src="JS/cookie.js"></script>
    <script src="JS/mesFonctions.js"></script>
    <script src="JS/dark_light.js"></script>
    <script src="JS/navigation.js"></script>

  </body>
</html>
