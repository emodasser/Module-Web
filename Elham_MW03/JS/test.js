// console.debug("Test d'affichage d'un message"); 

/*let message = "La somme fait : ";
 let val1 = 15;
 let val2 = 4;
 let resultat = val1 + val2;
 console.log("VAL1 vaut : " + val1);
 console.log("VAL2 vaut : " + val2);
 console.log("RESULTAT vaut : " + resultat);
 console.log(message + resultat);               //calcul la somme
 console.log(message + val1 + val2)            //affiche les deux varibales l'un après l'autre
 */

 let p_footer = document.getElementById("p_footer");
 p_footer.addEventListener('mouseover', mon_popup);
function mon_popup() {
 alert("Gestion de l'évènement 'mouse over' sur mon footer");
}

//function afficherMasquerBarreNavigation();
// let hamburger = document.getElementById("hamburger");
// hamburger.addEventListener('click', afficherMasquerBarreNavigation);
// function afficherMasquerBarreNavigation() {
// console.debug("click sur hamburger");

// }