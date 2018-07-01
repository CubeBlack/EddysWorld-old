dialogos = [];
dialogos.loaded = function(){
	dialogos.search();
}
dialogos.search = function(){
	receved = function(msg){
		content = "";
		dados = JSON.parse(msg);
		
		//console.log(dados);
		for(ind = 0; ind < dados.length; ind++){
			//console.log(dados[ind].saida);
			dados[ind].saida = JSON.parse(dados[ind].saida);
			//console.log(dados[ind].saida);
			infoArr = {
			"id":dados[ind].id,
			"entrada":dados[ind].entrada,
			"retorno1":dados[ind].saida[0],
			"retorno2":dados[ind].saida[1],
			"retorno3":dados[ind].saida[2],
			"retorno4":dados[ind].saida[3],
			"personagem":dados[ind].personagem
			};
			
			content +=  page.replace(dialogos.tDialogo, infoArr);
		}
		//document.getElementById("dialogos").innerHTML = msg;
		document.getElementById("dialogos").innerHTML = content;
	}
	
	com = "grimorio.dialogos()";
	term.com(com,receved);
	document.getElementById("dialogos").innerHTML = "Loading...";
}
dialogos.update = function(id){
	receved = function(msg){
		//console.log(msg);
		dialogos.search();
	}
	entrada = document.getElementById("dialogo"+id+"-entrada").value;
	
	retorno = {};
	retorno[0] = document.getElementById("dialogo"+id+"-retorno1").value;
	retorno[1] = document.getElementById("dialogo"+id+"-retorno2").value;
	retorno[2] = document.getElementById("dialogo"+id+"-retorno3").value;
	retorno[3] = document.getElementById("dialogo"+id+"-retorno4").value;
	retorno = JSON.stringify(retorno);
	personagem = document.getElementById("dialogo"+id+"-personagem").value;

	infoArr = {
		"id":term.toStr(id),
		"entrada":term.toStr(entrada),
		"retorno":term.toStr(retorno),
		"personagem":term.toStr(personagem)
	};
	com = page.replace(dialogos.tDialogoUpdateCom,infoArr);
	//console.log(com);
	//com = dialogos.tDialogoUpdateCom;
	term.com(com,receved);
	//console.log(com);
	
}
dialogos.tDialogo = "<dialogo><dialogo-p1><input value='{id}' disabled><input value='{entrada}' id='dialogo{id}-entrada'></dialogo-p1><dialogo-p2><input value = '{retorno1}' id='dialogo{id}-retorno1'><br><input value = '{retorno2}' id='dialogo{id}-retorno2'><br><input value = '{retorno3}' id='dialogo{id}-retorno3'><br><input value = '{retorno4}' id='dialogo{id}-retorno4'><br><button type='button'>Adicionar</button></dialogo-p2><dialogo-p3><input value='{personagem}' id='dialogo{id}-personagem'><button type='button' onclick = 'dialogos.update({id})'>Salvar</button></dialogo-p3></dialogo>";
//dialogos.tDialogoUpdateCom = "grimorio.dialogoupdate(str\"{id}\",str\"{entrada}\",str\"{retorno}\",str\"{personagem}\")";
dialogos.tDialogoUpdateCom = "grimorio.dialogoReplace({id},{entrada},{retorno},{personagem})";
console.log("dialogos.js");