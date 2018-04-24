page = {};
page.loaded = function(){
	//------------ configuracao
	term.server = "http://cloto/server/server-terminal.php";
	//------------------
	console.log("page.load");
	page.statusLbl = document.getElementById("statusLbl");
	page.comandInp = document.getElementById("comandInp");
	page.content = document.getElementById("content");

	//mensagem de boas vindas do servidor
	term.com("",page.receved);
}
page.inputEnter = function (event){
	var keynum;
	if(window.event) { //IE
		keynum = event.keyCode
	} else if(event.which) { // Netscape/Firefox/Opera AQUI ESTAVA O PEQUENINO ERRO ao invés de "e." é "event."
		keynum = event.which
	}
	if( keynum == 13 ) {
		this.com();
    }
	//console.log(keynum);
}
page.com = function(){
	msg = page.comandInp.value;
	this.setContent(msg,"sended");
	term.com(msg,page.receved);
	page.comandInp.value = "";
}
//chamado no script "terminal"
page.receved = function(msg){
	page.setContent(msg,"receved");
}
//tipo:log/sended/receved
page.setContent = function(nStr,tipo = "log"){
	this.content.innerHTML += "<p id = \""  + tipo + "\">" + nStr + "</p>";
	this.content.scrollTop = this.content.scrollHeight;
}
