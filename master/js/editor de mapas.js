//world.show(json)

mapa = {};
page.loaded = function(){
	term = new Terminal();
	page.displayContet = document.getElementById("SD_content");
	page.log = document.getElementById("log");

	//loaded term
	term.server = "http://localhost/GitHub/EddysWorld/server/eddysworld_server.term.php";
	term.com("",page.receved);
	
	//loaded display
	view.loaded();
	//window.setInterval(function (){console.log("funcionando")},1000);
	
}
mapa.novo = function(){
	console.log("nova estrutura");
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
	this.log.innerHTML = "<p id = \""  + tipo + "\">" + nStr + "</p>" + this.log.innerHTML;
	this.log.scrollTop = 0;
}


