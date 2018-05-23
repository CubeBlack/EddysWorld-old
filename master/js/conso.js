conso = [];
conso.load = function(){
	conso.eleLog = document.getElementById("terminal-log");
}
conso.addLog = function(msg,tipo="send"){
	nLog = "";
	nLog += "<div class='" + tipo + "'>";
	if(tipo == "send") nLog += ">>";
	nLog += msg;
	nLog += "</div>";
	conso.eleLog.innerHTML = nLog + conso.eleLog.innerHTML
	conso.numLog++;
}