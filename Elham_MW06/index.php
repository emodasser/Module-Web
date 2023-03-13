<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>BTS SNIR - Dev WEB</title>
    <link rel="stylesheet" type="text/css" href="./CSS/ossature_grid.css">
    <link rel="stylesheet" type="text/css" href="./CSS/design.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    
  </head>

  <body id="body" data-theme="dark">
    <header>
      <img id="hamburger" src="Images/MyHamburger.png"></img>
      <h1>Dron'ir</h1>
    </header>
    <nav id="barre_navigation" action="rest.php" method="post">
      <div>
        <a href="#">Présentation</a>
      </div>
      <div>
        <a href="suivi.php?suivi" action="suivi.php" method="get">Suivi</a>
      </div>
      
      <?php
        if(isset($_COOKIE["pseudo"]))
        {
           echo '<div>
                <a href="formulaire_profil.php?profil">Profil</a>
                </div>';
           echo '<div>
                 <a href="rest.php?deconnexion">Deconnexion</a>
                 </div>';
        }
        else
        {
        
        echo '<div>
              <a href="formulaire_connexion.php">Connexion</a>
              </div>';
        echo  '<div>
              <a href="formulaire_inscription.php">Inscription</a>
              </div>';
        }
         
      ?>
    </nav>
    <section>
      <main>
        <h2>Le drone TELLO</h2>
        <div class="deux_colonnes">
          <img id="imgdronetello" src="./Images/DroneTelloSiteOfficiel.jpg"></img>
          <div class="colonne_texte">
            <p>Que vous soyez dans un parc, au bureau ou à la maison, vous pouvez décoller à tout moment et découvrir le monde avec un œil nouveau. Tello est doté de deux antennes qui permettent une transmission vidéo parfaitement stable et d’une batterie de grande capacité pour des durées de vol impressionnantes.</p>
            <div class="quatre_colonnes">
              <p>Temps de vol<br/><span class="evidence">13 min</span></p>
              <p>Distance de vol<br/><span class="evidence">100 m</span></p>
              <p>Caméra<br/><span class="evidence">720P</span></p>
              <p>Transmission<br/><span class="evidence">2 antennes</span></p>

              
                <video controls>
                
                  <source src="./Videos/Introducing Tello - DJI store.mp4" type="video/mp4">
                
                </video>
              

                <br>
              
                 <video controls>
                
                  <source src="./Videos/DJI RYZE INTEL.mp4" type="video/mp4">
                
                </video>

            </div>
          </div>
        </div>
        <h2>Le Mavic Air</h2>
        <p>A compléter</p>
<!--        <img id="imgdronemavic" src="DroneTelloFondOrangeRedecoupe.jpg"></img>
        <p>On pourrait demander aux étudiants de présenter les 2 familles de drônes que nous utilisons au lycée, en mode reportage, avec des liens vers les documentations, une galerie de photo et même des liens vers les vidéos offcielles de ces drones ;)</p>
-->
      </main>
    </section>
    <aside>
      <h1>Les drones utilisés</h1>
      <p>Commençons avec le drone <a href="https://www.ryzerobotics.com/fr/tello">Tello.</a> Son prix abordable nous permet d'en avoir plusieurs et de les utiliser en modules. Son protocole de communication est ouvert et disponible ! Il est alors plus aisé dele piloter à notre guise !</p>
      <p>Ensuite nous avons le <a href="https://www.dji.com/fr/mavic">Mavic Pro</a>. Ce drone sera utilisé en projet, les étudiants récupèrent des informations de vol et exploitent ensuite les données recueillies.</p>
        <!-- <h5>Début du stage dans :</h5>
        <div id="jours" class="compteur">264J</div>
        <div id="heures" class="compteur">1H</div> 
        <div id="minutes" class="compteur">41M</div>
        <div id="secondes" class="compteur">38S</div> -->
    </aside>
    <footer type="button" name="Mode sombre" id=p_footer id="dark_light">
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
        <a href="CV.html" alt="Mon CV" target="_blank">Consulter mon CV</a>
        <a href="https://css-tricks.com/snippets/css/complete-guide-grid/">Tout sur les Grid CSS</a>
        <button id="dark_light" type="button">Mode Sombre</button>
      </div>
      
    </footer>
    <!-- <script src="JS/test.js"></script> -->
    <script src="JS/navigation.js"></script>
    <script src="JS/dark_light.js"></script>
      
    
  </body>

</html>

<!-- commentaire !>
