var user = new Object;
if(typeof(Worker) !== "undefined") {
    if(typeof(w) == "undefined") {
        syncInert = new Worker("js/syncScreen.js");
        getUser = new Worker("js/getUser.js");
        
        console.log("com1");
    }
    else{
        console.log("web worker definido");
    }
    //screen
    syncInert.addEventListener('message', function(e) {
        //console.log(e.data);
        document.getElementById("screen").innerHTML = e.data;
        setInterval(syncInert.postMessage("value"), 500);
    }, false);
    syncInert.postMessage("value");
    //console.log(syncInert);
    //user
    getUser.addEventListener('message', function(e) {
        //console.log(e.data);
        document.getElementById("screen").innerHTML = e.data;
        setInterval(syncInert.postMessage("value"), 500);
        user = e.data;
        console.log(user.id);
        registro();
    }, false);
    getUser.postMessage("value");
    
} else {
    //document.getElementById("sysLog2").innerHTML = "Sorry! No Web Worker support.";
    console.log("web worker não suportado");
}

function pageLoaded(){
  console.log("carreegado");
  writPage();
  document.getElementById("sysLog2").innerHTML = "loadedPage";
}
function writPage(){
  //document.getElementById("corpo").innerHTML = strCorpo;
  //document.getElementById("demo").innerHTML
}
function alertBoxOpen(value){
    document.getElementById("alertBox").innerHTML = value;
}
function alertBoxClose(){
    
}

function registro(){
    if(user.id_message == ""){
        inBox = "";
        inBox += "<h1>Registre-se</h1>";
        inBox += "<hr>";
        inBox += "Code: " + user.check;
        inBox += "<hr>";
        inBox += "";
        alertBoxOpen(inBox);
    }
    else{
        alertBoxOpen("registrado");
    }
}
//alertBoxOpen("value");

