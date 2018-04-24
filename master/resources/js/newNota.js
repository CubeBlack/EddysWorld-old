/*
Quando executa um novo comando
a funcção de resposta troca
não sei ainda porque
*/
content = "";

page.novaNota = function(){
	//formularioio para nova nota
	this.popContent(page.notaform);
	document.getElementById("fNotaCabecario").innerHTML = "Nova Nota" ;
	document.getElementById("fNotaAplic").setAttribute("OnClick","page.novaNotaAplic()");
	document.getElementById("fNotaAplic").setAttribute("value","Salvar");
	this.popUp();
}
page.rNovaNota = function(msg){
	console.log(msg);
	page.popUp();
};
page.novaNotaAplic = function(){
	com = "dado.novo(strBegin\"";
	com += document.getElementById("fNotaDado").value;
	com += "\"strEnd,strBegin\"";
	com += document.getElementById("fNotaTag").value;
	com += "\"strEnd)";
	console.log(com);
	term.com(com,page.rNovaNota);
};
console.log("newNota.js");