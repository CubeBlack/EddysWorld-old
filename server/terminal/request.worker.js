function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
onmessage = function(e) {
	resposta = httpGet(e.data);
	postMessage(resposta);
  //postMessage("mensagem retornada, " + e.data);
}
