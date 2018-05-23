page = [];
page.server = "https://localhost/EddysWorld/server/eddysworld_server.term.php";
page.workerUrl = "https://localhost/Teminal/v002.0/terminal_v1.1worker.js";
page.load = function(){
	term = new Terminal();
	term.server = page.server;
	term.workerUrl = page.workerUrl;
	term.on();
	conso.load();
	view.loaded();
	go.load();
}
console.log("master.js");