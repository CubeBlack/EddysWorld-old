function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
function sysLog(){
  reposta = httpGet("../../json/sysLog.php");
  postMessage(reposta);
  setTimeout("sysLog()",500)
}
sysLog();
