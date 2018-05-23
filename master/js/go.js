go = [];
go.load = function(){
	//GameObject
	go.pGo = document.getElementById("proprieades-go");
	go.pGo_id = document.getElementById("proprieades-go-id");
	go.pGo_x = document.getElementById("proprieades-go-x");
	go.pGo_y = document.getElementById("proprieades-go-y");
	go.pGo_width = document.getElementById("proprieades-go-width");
	go.pGo_heigth = document.getElementById("proprieades-go-height");
	go.pGo_tipo = document.getElementById("proprieades-go-tipo");
	//Tipo Inert
	go.pInert = document.getElementById("proprieades-inert");
	go.pInert_nome = document.getElementById("proprieades-inert-nome");
	go.pInert_desc = document.getElementById("proprieades-inert-desc");
	//Tipo Personagem
	go.pPersonagem = document.getElementById("proprieades-personagem");
	//Tipo Player
	go.pPlayer = document.getElementById("proprieades-player");
	//proprieades-acao
	go.pAcao = document.getElementById("proprieades-acao");
	//options-acoes
	go.pAcoes = document.getElementById("options-acoes");
	
	go.cancelar();

}
go.propriedades = function(id){
	
	receved = function(msg){
		conso.addLog(msg,"");
		go.pAcoes.innerHTML += '<input type="button" onclick="go.atualizar()" value="Atualizar">';
		go.pAcoes.innerHTML += '<input type="button" onclick="go.apagar()" value="Apagar">';
		go.pAcoes.innerHTML += '<input type="button" onclick="go.cancelar()" value="Cancelar">';
		tGo = JSON.parse(msg);
		go.pGo.style.display = "block";
		go.pGo_id.value = tGo.id;
		go.pGo_x.value = tGo.position.x;
		go.pGo_y.value = tGo.position.y;
		go.pGo_width.value = tGo.tamanho.x;
		go.pGo_heigth.value = tGo.tamanho.y;
		go.pGo_tipo.value = tGo.tipo;
		if(tGo.tipo=="inert"){
			go.pInert.style.display = "block";
			go.pInert_nome.value = tGo.name;
			go.pInert_desc.value = tGo.descricao;
			//go.pInert_desc.value = tGo.descricao;
		}
		else if(tGo.tipo=="personagem"){
			go.pPersonagem.style.display = "block";
		}
	}
	go.cancelar();
	com = "go.get("+id+")";
	term.com(com,receved);
	conso.addLog(com);
}

go.novo = function(){
	go.cancelar();
	go.pGo.style.display = "block";
	go.pAcoes.innerHTML = '<input type="button" onclick="go.salvar()" value="Salvar"><input type="button" onclick="go.cancelar()" value="Cancelar">';
}
go.salvar = function(){
	receved = function(msg){
		conso.addLog(msg,"");
		console.log(msg);
		console.log(term.ultimoRequerimentoDoServidor);
		go.cancelar();
	}
	com = "";
	gParametros = "";
	gParametros += go.pGo_x.value + ",";
	gParametros += go.pGo_y.value + ",";
	gParametros += go.pGo_width.value + ",";
	gParametros += go.pGo_heigth.value;
	if(go.pGo_tipo.value == "inert"){
		com = "inert.criar(";
		com += gParametros + ",";
		com += go.pInert_nome.value + ",";
		com += term.toStr(go.pInert_desc.value);
		com += ")";
	}
	else{
		com = "go.add(";
		com += gParametros;
		com += ",null)";
	}
	conso.addLog(com);
	term.com(com,receved);
}
go.atualizar = function(){
	receved = function(msg){
		conso.addLog(msg,"");
		console.log(msg);
		console.log(term.ultimoRequerimentoDoServidor);
		go.cancelar();
	}
	com = "";
	gParametros = "";
	gParametros += go.pGo_id.value + ",";
	gParametros += go.pGo_x.value + ",";
	gParametros += go.pGo_y.value + ",";
	gParametros += go.pGo_width.value + ",";
	gParametros += go.pGo_heigth.value ;
	//gParametros += go.pGo_tipo.value;
	console.log(term.toStr(go.pInert_desc.innerHTML));
	if(go.pGo_tipo.value == "inert"){
		com = "inert.update(";
		com += gParametros + ",";
		com += go.pInert_nome.value + ",";
		com += term.toStr(go.pInert_desc.value);
		console.log(go.pInert_desc.value);
		com += ")";
		//console.log(term.toStr(go.pInert_desc.innerHTML));
	}
	else if(go.pGo_tipo.value == "personagem"){
		com = "persona.update(";
		//com +=  + ;
		com += "," + go.pInert_nome.value  + ")";
	}
	else{
		com = "go.update(";
		com += gParametros;
		com += ")";
	}
	conso.addLog(com);
	term.com(com,receved);
}
go.cancelar = function(){
	go.pGo.style.display = "none";
	go.pInert.style.display = "none";
	go.pPersonagem.style.display = "none";
	go.pPlayer.style.display = "none";
	//limpar go
	go.pGo_id.value = "";
	go.pGo_x.value = "";
	go.pGo_y.value = "";
	go.pGo_width.value = "";
	go.pGo_heigth.value = "";
	go.pGo_tipo.value = "";
	// limpatr tipo
	go.pInert_nome.value = "";
	go.pInert_desc.innerHTML = "";
	go.pInert_desc.value = "";
	//
	go.pAcoes.innerHTML = '<input type="button" onclick="go.novo()" value="Novo">';
}
go.setTipo = function(){
	tipo = go.pGo_tipo.value;
	if(tipo=="inert"){
		go.pInert.style.display = "block";
	}
	else if(tipo=="personagem"){
		go.pPersonagem.style.display = "block";
	}
	else{
		go.pInert.style.display = "none";
		go.pPersonagem.style.display = "none";
		go.pPlayer.style.display = "none";
	}
}
go.apagar = function(){
	receved = function(msg){
		conso.addLog(msg,"");
		console.log(msg);
		console.log(term.ultimoRequerimentoDoServidor);
		go.cancelar();
	}
	com = "go.drop("+go.pGo_id.value+")";
	term.com(com,receved);
	conso.addLog(com);
}
