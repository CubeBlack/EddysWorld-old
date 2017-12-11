function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
onmessage = function(e) {
	resposta = e.data;
	resposta["str"] = httpGet(e.data["url"]);
	postMessage(resposta);
	
}
