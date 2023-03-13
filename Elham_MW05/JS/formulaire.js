/*----mdp identique----*/

let mdp1 = document.getElementById("mdp1");
let mdp2 = document.getElementById("mdp2");

let mdp_longueur = document.getElementById("mdp_longueur");
let mdp_majuscule = document.getElementById("mdp_majuscule");
let mdp_minuscule = document.getElementById("mdp_minuscule");
let mdp_chiffre = document.getElementById("mdp_chiffre");
let mdp_special = document.getElementById("mdp_special");


submit = bouton_inscription.addEventListener('click',VerifierFormulaireInscription);


function VerifierFormulaireInscription(){

    // console.log(mdp1);
    // console.log(mdp2);

    if(mdp1.value!=mdp2.value){
        alert("Les mots de passe sont différents");
        event.preventDefault(false);

    }
    else{

        alert("Les mots de passe sont identiques");

    }

  
}

/*----------8 charactères---------*/

mdp1.addEventListener('input',VerifierMotDePasse);

function VerifierMotDePasse(){
    if(mdp1.value.length>=8){
        
        if(document.getElementById("mdp_longueur").classList.contains('rouge') )
        {
            document.getElementById("mdp_longueur").classList.remove('rouge');
            document.getElementById("mdp_longueur").classList.add('vert');

            // console.debug("nombre de caractères sont incorrects");
        }
        
    }

    else{

        document.getElementById("mdp_longueur").classList.add('rouge');
        // console.debug("nombre de caractères sont corrects");
        }
   

    /*------majuscule---------*/

    let nbMajuscules = 0;

    for (let i=0; i<mdp1.value.length;i++){
        // console.debug(mdp1.value.charAt(i));

        if(mdp1.value.substr(0,1).toUpperCase!=mdp1.value.substr(0,1).toLowerCase){

            nbMajuscules+=1;
            document.getElementById("mdp_majuscule").classList.remove('rouge');
            document.getElementById("mdp_majuscule").classList.add('vert');

        }

        else{
        //     nbMajuscules=0;
        document.getElementById("mdp_majuscule").classList.add('rouge');
        }

        console.debug(nbMajuscules);


    }


}



