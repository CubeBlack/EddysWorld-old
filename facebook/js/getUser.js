function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
self.addEventListener('message', function(e) {
  url = "../../json/userPerfil.php?"+ e.data;
  //conteudo = httpGet(url);
  conteudo = JSON.parse(httpGet(url));
  console.log("GetUser");
  self.postMessage(conteudo);
}, false);
