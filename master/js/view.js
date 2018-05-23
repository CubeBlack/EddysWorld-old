view = {};
view.x = 0;
view.y = 0;
view.z = 0;

view.mFps = 50000;
view.bGrid = 20;
view.obj = [];
view.loaded = function(){
	termView = new Terminal();
	termView.server = page.server;
	termView.workerUrl = page.workerUrl;
	termView.on();
	
	view.loop();
	//
	view.ele = document.getElementById("display");
	view.dlx = document.getElementById("display-label-x");
	view.dly = document.getElementById("display-label-y");
	view.dlz = document.getElementById("display-label-z");
	//
	view.resetar();

	
}
view.resetar = function(){
	view.x = view.ele.offsetWidth/2;
	view.y = view.ele.offsetHeight/2;
	view.z = 1;
	view.rewrite();
}
view.setIn = function(){
	view.z = view.z *2;
	view.rewrite();
}
view.setOut = function(){
	view.z /= 2;
	view.rewrite();
}
view.setRigth = function(){
	view.x -=40/view.z;
	view.rewrite();
}
view.setLeft = function(){
	view.x +=20/view.z;
	view.rewrite();
}
view.setUp = function(){
	view.y -=20/view.z;
	view.rewrite();
}
view.setDown = function(){
	view.y +=20/view.z;
	view.rewrite();
}
view.loop = function(){

	receved = function(msg){

		if(msg==view.old){
			//view.loop();
			window.setTimeout(view.loop(),view.mFps);
			return;
		}
		view.old = msg;
		if(msg[0]!="["){
			window.setTimeout(view.loop(),view.mFps);
			view.ele.innerHTML = msg;
			return;
		}
		view.obj = JSON.parse(msg);
		view.rewrite();
		window.setTimeout(view.loop(),view.mFps);
	}
			
	termView.com("world.show(json)",receved);
}
view.rewrite = function(){
	view.dlx.innerHTML = view.x;
	view.dly.innerHTML = view.y;
	view.dlz.innerHTML = view.z;
	
	view.ele.innerHTML = "";
	view.grid();
	
	for(index = 0; index < view.obj.length;index++){
		gObj = document.createElement("div");
		gObj.setAttribute("id",view.obj[index].id);
		gObj.setAttribute("onclick","go.propriedades("+view.obj[index].id+")");
		style = "";
			style += "top:"+((parseInt(view.obj[index].position.y)*view.z)+view.y)+"px;";
			style += "left:"+((parseInt(view.obj[index].position.x)*view.z)+view.x)+"px;";
			style += "width:"+(view.obj[index].tamanho.x*view.z) +"px;";
			style += "height:"+(view.obj[index].tamanho.y*view.z) +"px;";
		gObj.setAttribute("style",style);
		gObj.setAttribute("class","innert");
		gObj.innerHTML = view.obj[index].name;
		view.ele.appendChild(gObj);

	}
}
view.grid = function(){
	
	for(num = 1; num < view.x/view.bGrid;num++){
		v = document.createElement("div");
		v.setAttribute("id","");
		v.setAttribute("onclick","");
		style = "";
			style += "top:0px;";
			style += "left:"+(view.x-(num*view.bGrid))+"px;";
			style += "width:0px;";
			style += "height:100%; ";
		v.setAttribute("style",style);
		v.setAttribute("class","grid");
		view.ele.appendChild(v);
		//
		v = document.createElement("div");
		v.setAttribute("id","");
		v.setAttribute("onclick","");
		style = "";
			style += "top:0px;";
			style += "left:"+((num*view.bGrid)+view.x)+"px;";
			style += "width:0px;";
			style += "height:100%; ";
		v.setAttribute("style",style);
		v.setAttribute("class","grid");
		view.ele.appendChild(v);

	}
	for(num = 1; num < view.y/view.bGrid;num++){
		h = document.createElement("div");
		h.setAttribute("id","");
		h.setAttribute("onclick","");
		style = "";
			style += "left:0px;";
			style += "top:"+(view.y-(num*view.bGrid))+"px;";
			style += "width:100%;";
			style += "height:0px; ";
		h.setAttribute("style",style);
		h.setAttribute("class","grid");
		view.ele.appendChild(h);
		//
		h = document.createElement("div");
		h.setAttribute("id","");
		h.setAttribute("onclick","");
		style = "";
			style += "left:0px;";
			style += "top:"+((num*view.bGrid)+view.y)+"px;";
			style += "width:100%;";
			style += "height:0px; ";
		h.setAttribute("style",style);
		h.setAttribute("class","grid");
		view.ele.appendChild(h);

	}
	v = document.createElement("div");
	v.setAttribute("id","");
	style = "";
		style += "top:0px;";
		style += "left:"+view.x+"px;";
		style += "width:0px;";
		style += "height:100%; ";
	v.setAttribute("style",style);
	v.setAttribute("class","grid-zero");
	view.ele.appendChild(v);
	vl = document.createElement("div");
	vl.innerHTML = 0;
	view.ele.appendChild(vl);

	h = document.createElement("div");
	h.setAttribute("id","");
	h.setAttribute("onclick","");
	style = "";
		style += "top:"+view.y+"px;";
		style += "left:0px;";
		style += "width:100%;";
		style += "height:0; ";
	h.setAttribute("style",style);
	h.setAttribute("class","grid-zero");
	view.ele.appendChild(h);
}

//------- ao carregar
console.log("go.js");