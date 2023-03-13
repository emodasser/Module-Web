function requeteHTTP(requeteURL,methode,donnees){
  //http://www.toutjavascript.com/savoir/xmlhttprequest.php3
  var http_objet = null;
  let fullURL = window.location.href;
  let hostname=window.location.hostname;
  let res = fullURL.split("/");
  let fullHostname=res[0]+"//"+hostname;

  if(window.XMLHttpRequest) // Firefox
  http_objet = new XMLHttpRequest();
  else { // XMLHttpRequest non supporté par le navigateur
    alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
    return;
  }
  var donneesRetourne='';
  var url=fullHostname+"/MW08/api/";
  var req=url+requeteURL;
  http_objet.open(methode, req, false);
  http_objet.onreadystatechange = function() {
    if(this.readyState == 4)
    {
      donneesRetourne = this.responseText;
    }
  }
  // Parametre à ajouter pour la methode POST
  //http_objet.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http_objet.setRequestHeader('Accept','application/json');
  http_objet.setRequestHeader('Access-Control-Allow-Origin', 'true');
  http_objet.send(donnees);
  return donneesRetourne;
}
