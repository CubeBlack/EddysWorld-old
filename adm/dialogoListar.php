<script>
    
        console.log("Make");
    
</script>
<?php
//eval("$obj->" . $metodo . "()");
require_once '../engine/sala.php';
$dialogoId = null;
$situacao = "Novo dialogo em sua situação corrente.";


$situtionList = $sala->mePlayer()->sitiationAll();

if(isset($_REQUEST["act"])){
    $act = $_REQUEST["act"];
    if($act=="save"){
        $elementoNum = $_REQUEST["elementos"];
        $msg = $_REQUEST["msg"];
        $msgObj["msg"] = $msg;
        $msgObj["function"] = "hunter";
        $msgJson = json_encode($msgObj);
        $query = null;
        for($a = 0; $a < $elementoNum; $a++){
            $value = $_REQUEST[$a."value"];
            //if($_REQUEST[$a."value"]=="undefined") $value = "";
            $query[$_REQUEST[$a."label"]] = $_REQUEST[$a."value"];
        }
        
        $sitJson = json_encode($query);
        var_dump($sitJson);
        
        $dialogoId = Oracao::add($sitJson, $msgJson);
        if($dialogoId!=null||$dialogoId!="") $situacao = "Dialogo salvo com sucesso!";
        else{
            $situacao = "Erro ao salvar dialogo!";            
        } 
        
        echo $dialogoId;
    }
    else{
        $situacao = "situaçãao indefinida";
    }
}
else{
    $situtionList = $sala->mePlayer()->sitiationAll();
}
echo "$situacao<br>";
echo "..........................................<br><br>";

$num = 0;
echo '<br>Atual<br>';
foreach ($situtionList as $key => $value) {
    echo "<input id =\"{$num}check\" type=\"checkbox\" checked> ";
    echo "<label id =\"{$num}label\" >$key</label> = ";
    echo "<input id =\"{$num}value\" type=\"text\" disabled=\"disabled\">. ";
    ++$num;
}
echo '<br>Operacionais<br>';
echo "<input id =\"{$num}check\" type=\"checkbox\" checked>";
echo "<label id =\"{$num}label\" >send</label>";
echo "<input id =\"{$num}value\" type=\"text\" value=\"\">";
++$num;

echo "<input id =\"{$num}check\" type=\"checkbox\" checked>";
echo "<label id =\"{$num}label\" >func</label> ";
echo "<input id =\"{$num}value\" type=\"text\" value=\"\">";
++$num;

echo "<hr>";
$local = "'conteudoDialogo'";
$page = "'dialogoListar'";

$adicional = "'elementos=$num'";
$adicional .= " + '&dialogId=$dialogoId'";
$adicional .= " + '&msg=' + document.getElementById('msg').value";
for($a = 0; $a < $num;$a++){
    $adicional .= " + '&{$a}check=' ";
    $adicional .= " + document.getElementById('{$a}check').value";
    $adicional .= " + '&{$a}value='";
    $adicional .= " + document.getElementById('{$a}value').value";
    $adicional .= " + '&{$a}label='";
    $adicional .= " + document.getElementById('{$a}label').innerHTML";
}

$adicional .= "";
echo "<input onClick = \"load($page,$local);\" type=\"button\" value=\"Refresh\">";
echo "<input onClick = \"load($page,$local,$adicional+'&act=save');\" type=\"button\" value=\"save\">";
//echo "<input type=\"button\" value=\"seach\">";
//echo "<input type=\"button\" value=\"salvar\">";
echo "<hr>";
//echo "<br>";
echo "<textArea id = \"msg\"style=\"width: 100%;\"></textArea>";


echo '<br>func:<br>';
echo "<input id =\"{$num}check\" type=\"checkbox\" checked>";
echo "<label id =\"{$num}label\" >setWeit</label>";
echo "<input id =\"{$num}value\" type=\"text\" value=\"\">";
++$num;


echo "<hr>";
echo "...";
echo "<pre>";
$dialogoForThis = Oracao::resposta($situtionList);
//var_dump($dialogoForThis);
foreach ($dialogoForThis as $key => $row) {
    echo "<hr>";
    echo "<h2>ID: {$row["id"]}</h2>";
    
    foreach ($row["anchor"] as $key => $value) {
        echo "$key = $value | ";
    }
    echo "<br>Resposta.<br>";
    foreach ($row["resp"] as $key => $value) {
        echo "$key = $value| ";
    }
    echo "<br>";
    echo "<input onClick = \"load('dialogoDrop',$local,'id={$row["id"]}');\" type=\"button\" value=\"Apagar\">";
    echo "<input onClick = \"load('');\" type=\"button\" value=\"Editar\">";
}
