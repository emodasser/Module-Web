
<?php

include "model.php";

$donnees="/AfficherGrapheVol";
$reponseAPIJson=executerRequeteCurl($donnees,"GET");

/*
<th></th><th></th><th>vgz</th>
<th>templ</th><th></th><th></th>
<th></th><th>bat</th><th></th><th></th>
<th></th><th></th><th></th>
*/


echo "<div class='menu_graphe'>
<form  class='menu_graphe' action='index.php' method='get'>
<label class='etat' for='pitch'><input type='checkbox' name='etat[]' value='pitch' id='pitch'>pitch</label>
<label class='etat' for='roll'><input type='checkbox' name='etat[]' value='roll' id='roll'>roll</label>
<label class='etat' for='yaw'><input type='checkbox' name='etat[]' value='yaw' id='yaw'>yaw</label>
<label class='etat' for='vgx'><input type='checkbox' name='etat[]' value='vgx' id='vgx'>vgx</label>
<label class='etat' for='vgy'><input type='checkbox' name='etat[]' value='vgy' id='vgy'>vgy</label>
<label class='etat' for='vgz'><input type='checkbox' name='etat[]' value='vgz' id='vgz'>vgz</label>
<label class='etat' for='templ'><input type='checkbox' name='etat[]' value='templ' id='templ'>templ</label>
<label class='etat' for='temphn'><input type='checkbox' name='etat[]' value='temphn' id='temphn'>temphn</label>

<label class='etat' for='tof'><input type='checkbox' name='etat[]' value='tof' id='tof'>tof</label>
<label class='etat' for='h'><input type='checkbox' name='etat[]' value='h' id='h'>h</label>
<label class='etat' for='bat'><input type='checkbox' name='etat[]' value='bat' id='bat'>bat</label>
<label class='etat' for='baro'><input type='checkbox' name='etat[]' value='baro' id='baro'>baro</label>
<label class='etat' for='time'><input type='checkbox' name='etat[]' value='time' id='time'>time</label>
<label class='etat' for='agx'><input type='checkbox' name='etat[]' value='agx' id='agx'>agx</label>
<label class='etat' for='agy'><input type='checkbox' name='etat[]' value='agy' id='agy'>agy</label>
<label class='etat' for='agz'><input type='checkbox' name='etat[]' value='agz' id='agz'>agz</label>

</div>";
echo "<input type='button' class='bouton_graphe' name='AfficherGrapheVol' value='Graphe' onclick='afficherGraphe()'>";
echo "<div class='container_graphe' id='chartdiv'></div>";

?>
<script src="//cdn.amcharts.com/lib/4/core.js"></script>
<script src="//cdn.amcharts.com/lib/4/charts.js"></script>
<script src="./JS/graphe.js"></script>
