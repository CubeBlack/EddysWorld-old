term =  {};
term = {};
term.sends = [];
term.receved = "";
term.wRequest = new Worker("request.worker.js");
//---------- config
term.server = "https://cloto/server/server-terminal.php";

term.send_pre = "";
term.send_pos = "";

term.receved_pre = "";
term.receved_pos = "";
//-------------


term.com = function(comander,retorno){
	this.send(comander,retorno);
}
term.send = function(comander,retorno){
	if(term.server == "")
		return "Servidor n'ao reconhecido";
	
	mensage = this.server + "?comander=" + comander;
	this.wRequest.postMessage(mensage);
	
	this.wRequest.onmessage = function(event) {
		term.receved = event.data;
		retorno(event.data);
	}
	//return this.receved;
}
console.log("terminal.js");