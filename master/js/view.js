view = {};

view.loaded = function(){
	sd = SimpleDisplay.new(page.displayContet,"display");
	view.term = new Terminal();
	//console.log(view.term)
	view.frm()
}
view.receved = function(msg) {
	//console.log(msg);
	//setTimeout(view.frm,1000)
	obj = json.parse(msg);
	console.log(obj);
}
view.frm = function(){
	view.term.com("world.show()",view.receved);
	sd.rewrite();
}

//------- ao carregar
console.log("view.js");