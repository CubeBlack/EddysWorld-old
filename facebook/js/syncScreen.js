function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
self.addEventListener('message', function(e) {
  //reposta = httpGet("../../json/screen.php?" + e.data);
  resposta = JSON.parse(httpGet("../../json/screen.php?query=" + e.data));
  conteudo = "";
  //----------- Asset
  for(a = 0; a < resposta.asset.length;a++){
      if(resposta.asset[a].tipo == "inert"){
        conteudo += "<rect ";
        conteudo += "id=\"inert\" ";
        conteudo += "x=\"" + resposta.asset[a].dim_x + "\" "
        conteudo += "y=\"" + resposta.asset[a].dim_y + "\" "
        conteudo += "width=\"" + resposta.asset[a].pos_x + "\" ";
        conteudo += "height=\"" + resposta.asset[a].pos_y + "\" ";
        conteudo += "/>"; 
        //conteudo += "<br> "; 
        conteudo += "\n "; 
        //echo "<rect id = \"inert\" x= \"$newX\" y= \"$newY\" width=\"$newWidth\" height=\"$newHeight\" />";
      }
      if(resposta.asset[a].tipo == "player"){
        conteudo += "<circle ";
        conteudo += "id=\"player\" ";
        conteudo += "cx=\"" + resposta.asset[a].pos_x + "\" "
        conteudo += "cy=\"" + resposta.asset[a].pos_y + "\" "
        conteudo += "r=\"5\" ";
        conteudo += "/>"; 
        //conteudo += "<br> "; 
        conteudo += "\n "; 
        //<circle cx="70" cy="25" r="15" />
      }
      if(resposta.asset[a].tipo == "npc"){
        conteudo += "<circle ";
        conteudo += "id=\"npc\" ";
        conteudo += "cx=\"" + resposta.asset[a].pos_x + "\" "
        conteudo += "cy=\"" + resposta.asset[a].pos_y + "\" "
        conteudo += "r=\"5\" ";
        conteudo += "/>"; 
        //conteudo += "<br> "; 
        conteudo += "\n "; 
        //<circle cx="70" cy="25" r="15" />
      }
  }
  //conteudo += resposta.asset[0].dim_x;
  //console.log(resposta.asset[0]);
  self.postMessage(conteudo);
}, false);
