page = [];
term = new Terminal();
sTerm = new Terminal();
//- - - - - Pop
page.loaded = function(){
	//------------ configuracao
	term = new Terminal();
	sTerm = new Terminal();
	
	term.server = "http://github/Cloto/server/server-terminal.php";
	term.workerUrl = "http://github/Teminal/v002.0/terminal_v1.1worker.js";
	
	sTerm.server = "http://github/Cloto/server/server-terminal.php";
	sTerm.workerUrl = "http://github/Teminal/v002.0/terminal_v1.1worker.js";
	
	sTerm.on();
	term.on();
	//------------------
	page.search();
}
//- - - - - PopUp
page.checkPop = false;
page.popUp = function(){
	this.checkPop = !this.checkPop;
	if(this.checkPop){
		document.getElementById("popUp").style = "display:block;";
	}
	else{
		document.getElementById("popUp").style = "display:none;";
	}

}
page.popContent = function(content=""){
	document.getElementById("popUp-content").innerHTML = content;
}
page.drop = function(id){
	com = "dado.drop(" + id + ")";
	console.log(com);
	term.com(com,page.rDrop);
};
page.rDrop = function(msg){
	console.log(msg);
}	
page.notaform = "<div id=\"fNotaCabecario\"></div><form><label>Dado</label><textarea id=\"fNotaDado\"></textarea><label>Tags</label><textarea id=\"fNotaTag\"></textarea><input id=\"fNotaAplic\" onclick=\"\" value=\"Salvar\" type=\"button\"></form>";
page.loginform = "<form><label>Dado</label><textarea id=\"novaNotaDado\"></textarea><label>Tags</label><textarea id=\"novaNotaTag\"></textarea><input onclick=\"page.novaNotaAplic()\" value=\"Salvar\" type=\"button\"></form>";
console.log("page.js");