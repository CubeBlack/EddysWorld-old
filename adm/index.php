<!doctype html>
<html>
    <head>
        <title>Eddy's ADM</title>
        <meta charset="UTF-8">
        <script>
            metas = new Object();
            function load(page,local="",adicional="")
            {
                if(local=="") local = "conteudo";
                document.getElementById(local).innerHTML = "Loading...";
                theUrl = "";
                theUrl += page;
                theUrl += ".php";
                theUrl += "?" + adicional;
                //theUrl += "";
                //theUrl += "";
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
                xmlHttp.send( null );
                document.getElementById(local).innerHTML = xmlHttp.responseText;
                console.log(theUrl);
            }
        </script>
    </head>
    <body>
        <h1>Eddy's Word ADM</h1>
        <hr>
        <div id="menu">
            <a href = "#" onclick="load('userLogon');">userLogon</a>|
            <a href = "#" onclick="load('dialogo');">dialogo</a>|
        </div>
        <hr>
        <div id="conteudo"></div>
    </body>
</html>

