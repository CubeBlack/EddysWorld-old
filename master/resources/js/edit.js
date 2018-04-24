/*

*/

page.editOpen = function(id){
	//formularioio para editar
	this.popContent(page.notaform);
	document.getElementById("fNotaCabecario").innerHTML = "Loading..." ;
	
	
	com = "dado.get("+id+",json)";
	term.com(com,page.rEditOpen);
	this.popUp();
}
page.rEditOpen = function(msg){
	console.log(msg);
	if(msg[0]!="{"){
		console.log(msg);
		return;
	}
	nota = JSON.parse(msg);
	document.getElementById("fNotaCabecario").innerHTML = "Editar nota: " + nota.id;
	document.getElementById("fNotaDado").value = nota.dado;
	document.getElementById("fNotaTag").value = nota.tag;
	document.getElementById("fNotaAplic").setAttribute("OnClick","page.editExecute("+nota.id+")");
	document.getElementById("fNotaAplic").setAttribute("value","Atualizar");
};

page.editExecute = function(id){
	com = "dado.update("+id+",strBegin\"";
	com += document.getElementById("fNotaDado").value;
	com += "\"strEnd,strBegin\"";
	com += document.getElementById("fNotaTag").value;
	com += "\"strEnd)";
	console.log(com);
	term.com(com,page.rNovaNota);
	this.popContent(loading);
};
console.log("edit.js");