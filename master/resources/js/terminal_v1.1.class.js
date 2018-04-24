class Terminal{
	constructor(){
	this.sends = [];
	this.receved = "";
	//---------- config
	//servidor de testes, para offline
	this.server = "http://cloto/server/server-terminal.php";
	this.workerUrl = "";

	this.send_pre = "";
	this.send_pos = "";

	this.receved_pre = "";
	this.receved_pos = "";
	//-------------
	
	};
	//---------------------------
	com (comander,retorno){
		//for();
		comander = this.encode(comander);
		this.send(comander,retorno);
	}
	send (comander,retorno){
		console.log(this.wRequest);
		if(term.server == "")
			return "Servidor n'ao reconhecido";
		
		//mensage = "";
		var mensage = this.server + "?comander=" + comander;
		this.wRequest.postMessage(mensage);
		
		this.wRequest.onmessage = function(event) {
			term.receved = event.data;
			retorno(event.data);
		}
		//return this.receved;
	}
	on(){
		if(this.workerUrl==""){
			console.log("Terminal.workerUrl nao defino");
		}
		this.wRequest = new Worker(this.workerUrl);
	}
	encode(str){
		var nStr = "";
		for(var a = 0; a < str.length;a++){
			if(str[a]== "\n") {
				nStr += "%0";
				continue;
			}
			if(str[a]==","){
				nStr += "%2C";
				continue;
			}
			nStr += str[a];
		}
		return nStr;
	}
}
console.log("terminal_v1.1.class.js");