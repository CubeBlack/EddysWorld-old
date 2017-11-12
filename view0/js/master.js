view = {};

view.server = "http:/limaserver.esy.es/server_ew";
function loaded(){
	console.log("master.js loaded");
	view.displayContent = document.getElementById("display");
	SimpleDisplay.new(view.displayContent,"base");
}
view.frame = function(){
	
}