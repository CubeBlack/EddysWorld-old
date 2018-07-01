page = [];
page.server = "https://localhost/EddysWorld/server/eddysworld_server.term.php";
page.workerUrl = "https://localhost/Teminal/v002.0/terminal_v1.1worker.js";
page.load = function(){
	term = new Terminal();
	term.server = page.server;
	term.workerUrl = page.workerUrl;
	term.on();
	conso.load();
	//view.loaded();
	//go.load();
}
page.replace = function(base,dados){
	var dadosK=Object.keys(dados);
	for (var i = 0; i < dadosK.length; i++) {
		base = base.replace(new RegExp("{" + dadosK[i] + "}", 'g'),dados[dadosK[i]]);
	}
	return base;
}
console.log("master.js");