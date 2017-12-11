//set time
if(typeof(Worker) !== "undefined") {
    if(typeof(w) == "undefined") {
        msgSysc = new Worker("index/js/msgSync.js");
        sysLog = new Worker("index/js/sysLog.js");
        sendMsg = new Worker("index/js/sendMsg.js");
    }
    //msgSysc
    msgSysc.onmessage = function(event) {
      var ou = document.getElementById('ou');
      resposta = event.data;
      conteudo = "";
      if(resposta){
        for(a = 0; a < resposta.length;a++){
          if(resposta[a].user == "system"||resposta[a].user == "Grimorio")
            conteudo +="<div id = \"" + resposta[a].user + "\">";
          else
            conteudo +="<div id = \"Player\">";
          conteudo += "<div id=\"name\">" + resposta[a].user +"</div>"
          //conteudo +="<br>";
          conteudo += resposta[a].msg;
          conteudo +="</div>";
        }
      }
      else {
        conteudo = "Limpo";
      }
      ou.innerHTML = conteudo;
      ou.scrollTo(0,ou.scrollHeight);
    };
    sysLog.onmessage = function(event) {
      var sysLog1 = document.getElementById('sysLog1');
      resposta = event.data;
      conteudo = "";
      if(resposta){
          conteudo = resposta;
      }
      else {
        conteudo = "Limpo";
      }
      sysLog1.innerHTML = conteudo;
      sysLog1.scrollTo(0,ou.scrollHeight);
    };
} else {
    document.getElementById("sysLog2").innerHTML = "Sorry! No Web Worker support.";
}

//
function inputEnter(event){
  /*
  var keycode;
  if (window.event) {
    keycode = window.event.keyCode;
  }
  else if(e) {
    if (e.keyCode == 13) {
      send(inpu.value);
      inpu.value = "";
    }
  }
  */
  
  var keynum;
 		if(window.event) { //IE
 			keynum = event.keyCode
 		} else if(event.which) { // Netscape/Firefox/Opera AQUI ESTAVA O PEQUENINO ERRO ao invés de "e." é "event."
 			keynum = event.which
 		}
 		if( keynum == 13 ) {
      msg = document.getElementById("imput").value;
      document.getElementById("imput").value = "";
      send(msg);
    }
}
function send(value){
  sendMsg.addEventListener('message', function(e) {
    message = "";
    message += "Send: " + value + "<br>";
    //message += "return: " + e.data + "<br>";
    message += "weit: " + e.data.weit + "<br>";
    message += "func: " + e.data.func + "<br>";
    message += "<hr>";
    for(i = 0; i < e.data.log.length; i++){
      message += i + " - " + e.data.log[i] + "<br>";
    }
    document.getElementById("sysLog2").innerHTML = message;
  }, false);
  sendMsg.postMessage(value);
}

function pageLoaded(){
  console.log("carreegado");
  writPage();
  document.getElementById("sysLog2").innerHTML = "loadedPage";
}
function writPage(){
  strCorpo = "";
  strCorpo += "<div id = \"ou\"></div>";

  strCorpo += "<div id = \"in\">";
  strCorpo += "<textarea id=\"imput\" onKeyPress = \"inputEnter(event)\" ></textarea>";
  strCorpo += "</div>";

  strCorpo += "<div id = \"sysLog1\"></div>";
  strCorpo += "<div id = \"sysLog2\"></div>";

  document.getElementById("corpo").innerHTML = strCorpo;
  //document.getElementById("demo").innerHTML
}
