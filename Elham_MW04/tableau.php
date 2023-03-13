<?php

$piloteNum =  array(25,"Jean","Jacques");
// echo $piloteNum[0].'<br>';
// echo $piloteNum[1].'<br>';
// echo $piloteNum[2].'<br>';
for($i=0;$i<count($piloteNum);$i++){
    echo "la case numero : ".$i." vaut ".$piloteNum[$i]."<br>";
}
// var_dump($piloteNum);

$piloteAssoc = array(25,"Jean","Jacques");
foreach($piloteAssoc as $cle => $valeur)
{
    echo "La clé du tableau : ".$cle." est associée à la valeur ".$valeur."<br>";
}

?>