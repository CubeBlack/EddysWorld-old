function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
self.addEventListener('message', function(e) {
  reposta = httpGet("../../json/chatSend.php?query=" + e.data);
  //reposta = JSON.parse(httpGet("../../json/chatSend.php?query=" + e.data));
  postMessage(reposta);
}, false);
