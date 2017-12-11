console.log("master.js loaded");
page = {};
page.loaded = function(){
	page.nav = document.getElementById("menu");
	page.content = document.getElementById("content");
	page.wRequest = new Worker("js/request.worker.js");
	
	page.load("nav","nav");
	page.load("home","content");
}
page.load = function(pagina,local){
	local.innerHTML = "loading..";
	var send;
	send = [];
	send["url"] = "../pages/" + pagina + ".html";
	send["local"] = local

	this.wRequest.postMessage(send);
	
	this.wRequest.onmessage = function(event) {
		
		if(event.data["local"] == "nav"){
			local = page.nav;
}
		else if(event.data["local"] == "content"){
			local = page.content;
		}
		else{
			console.log("error(master.js): local not fold");
		}
		local.innerHTML = event.data["str"];
	}
}