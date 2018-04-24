page.query = "";
page.respostaOld = "";
page.searchN = 0;

page.search = function(){
	comStr= "";
	comStr += "dado.search(strBegin\"";
	comStr += page.query;
	comStr += "\"strEnd,json)";
	sTerm.com(comStr,page.rSearch);
	
}
page.setQuery = function(query){
	page.query = query;
	console.log("Query='" + page.query + "'");
}
page.rSearch = function(msg){
	page.search();
	
	if(page.respostaOld == msg){
		page.SearchCount();
		return;
	}
	if(msg[0]!="["){
		document.getElementById("content").innerHTML = msg;
		page.SearchCount();
		return;
	}
	dados = JSON.parse(msg);
	resposta = "";
	for(indice = 0; indice < dados.length; indice++){
		resposta += "<dado>";
			resposta += "<valor>";
				resposta += dados[indice].id;
				resposta += "<hr>";
				resposta += dados[indice].dado;
			resposta += "</valor>";
			resposta += "<tag>";
			for(iTag = 0; iTag < dados[indice].tag.length; iTag++){
				resposta += "<a onClick=\"page.setQuery('"+dados[indice].tag[iTag]+"')\">#";
				resposta += dados[indice].tag[iTag];
				resposta += ", </a>";
			}
			resposta += "</tag>";
			resposta += "<editar>";
				resposta += "<input type='button' value='Drop' onClick=\"page.drop('"+dados[indice].id+"')\">"
				resposta += "<input type='button' value='Edit' onClick=\"page.editOpen('"+dados[indice].id+"')\">"
			resposta += "</editar>";
		resposta += "</dado>";
	}
	
	document.getElementById("content").innerHTML = resposta;
	console.log(dados);
	page.respostaOld = msg;
	page.SearchCount();
}
page.SearchCount = function(){
	++page.searchN;
	aLoading = ["-|||||||","|-||||||","||-|||||","|||-||||","||||-|||","|||||-||","||||||-|","|||||||-",];
	searchlabel = "";
	if(page.query == ""){
		searchlabel += "All ";
	}
	else{
		searchlabel += page.query;
	}
	searchlabel += "[";
	searchlabel += aLoading[page.searchN%8];
	searchlabel += "]"
	if(page.searchN > 1000) page.searchN = 0;
	
	document.getElementById("aSearch").innerHTML = searchlabel;
}