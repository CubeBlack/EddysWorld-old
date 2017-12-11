function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
function msgSync(){
  HttoReposta = httpGet("../../json/chatList.php");
  //var resposta = new Object();
  try {
     resposta = JSON.parse(HttoReposta);
 } catch (e) {
    //resposta = new Object();
    resposta = [{user:"System",msg:HttoReposta,length:0}];
    //resposta[0].user  = "system";
    //resposta[0].mssg = HttoReposta;
 }
  //reposta = JSON.parse(httpGet("../../json/chatList.php"));
  postMessage(resposta);
  setTimeout("msgSync()",500)
  //console.log(resposta);
}
msgSync();
